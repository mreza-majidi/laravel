<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserChangePasswordRequest extends FormRequest
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
     * @return string[]
     */
    public function rules(): array
    {
        $this->session()->flash('previous-route', 'change-password');

        return [
            'old_password' => 'required',
            'new_password' => 'required|confirmed|min:6',
        ];
    }

    /**
     * @return mixed
     */
    public function getOldPassword()
    {
        return $this->get('old_password');
    }

    /**
     * @return mixed
     */
    public function getNewPassword()
    {
        return $this->get('new_password');
    }
}
