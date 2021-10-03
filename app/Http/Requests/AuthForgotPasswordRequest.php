<?php

namespace App\Http\Requests;

use App\Rules\ReCaptchaRule;
use Illuminate\Foundation\Http\FormRequest;

class AuthForgotPasswordRequest extends FormRequest
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
            'email'           => 'required|email',
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
}
