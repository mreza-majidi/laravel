<?php

namespace App\Http\Requests\User;

use App\Constants\UserConstants;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\UploadedFile;

class UpdateRequest extends FormRequest
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
        $status = implode(',', UserConstants::$statuses);

        return [
            'user'            => 'required|uuid',
            'email'           => 'email|string|max:191|unique:users,email,'.$this->getUserId(),
            'first_name'      => 'string|max:191',
            'last_name'       => 'string|max:191',
            'mobile_number'   => 'string|size:11',
            'national_number' => 'string|size:10',
            'address'         => 'string|max:191',
            'status'          => 'in:'.$status,
            'birth_date'      => 'date',
        ];
    }

    /**
     * @return mixed
     */
    public function getUserId()
    {
        return $this->get('user');
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->get('email');
    }


    /**
     * @return mixed
     */
    public function getStatus()
    {
        return $this->get('status');
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
     * @return mixed
     */
    public function getUserStatus()
    {
        return $this->get('status');
    }

    /**
     * @return boolean
     */
    public function isAvatar()
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
        return $this->get('birth_date');
    }
}
