<?php

namespace App\Http\Requests\Auth;

use App\Rules\ReCaptchaRule;
use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
        session()->flash('previous-route', 'website.web.auth.register');

        return [
            'email'           => 'required|string|email|max:255|unique:users',
            'password'        => 'required|string|confirmed|min:8',
            'recaptcha_token' => ['required', new ReCaptchaRule($this->recaptcha_token)],
        ];
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->get('email');
    }

    /**
     * @return mixed|string|null
     */
    public function getPassword()
    {
        return $this->get('password');
    }
}
