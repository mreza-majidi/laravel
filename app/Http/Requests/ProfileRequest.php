<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\UploadedFile;

class ProfileRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return boolean
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'first_name'      => 'required|string',
            'avatar'          => 'nullable|image|mimes:jpeg,jpg,png|max:1024',
            'last_name'       => 'required|string',
            'national_number' => 'required|string|max:12',
            'birth_date'      => 'string|required',
            'mobile_number'   => 'required|string|size:11',
            'address'         => 'required|string',
        ];
    }


    /**
     * @return mixed
     */
    public function getFirstName()
    {
        return $this->get('first_name');
    }

    /**
     * @return mixed
     */
    public function getLastName()
    {
        return $this->get('last_name');
    }

    /**
     * @return mixed
     */
    public function getMobileNumber()
    {
        return $this->get('mobile_number');
    }

    /**
     * @return mixed
     */
    public function getNationalNumber()
    {
        return $this->get('national_number');
    }

    /**
     * @return mixed
     */
    public function getAddress()
    {
        return $this->get('address');
    }
    /**
     * @return boolean
     */
    public function isAvatar(): bool
    {
        return $this->hasFile('avatar');
    }


    /**
     * @return array|UploadedFile|UploadedFile[]|null
     */
    public function getAvatarFile()
    {
        return $this->file('avatar');
    }

    /**
     * @return mixed
     */
    public function getBirthDate()
    {
        return convertJalaliToCarbon($this->get('birth_date'));
    }
}
