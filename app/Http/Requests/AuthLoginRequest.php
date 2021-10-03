<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AuthLoginRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
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
            'email'    => 'required|email',
            'password' => 'required|min:6',
        ];
    }

    public function getEmailAndPassword()
    {
        return [
            'email'    => $this->getEmail(),
            'password' => $this->getPassword(),
        ];
    }

    public function getEmail()
    {
        return $this->get('email');
    }

    public function getPassword()
    {
        return $this->get('password');
    }
}
