<?php

namespace App\Http\Requests;

use App\Rules\ReCaptchaRule;
use Illuminate\Foundation\Http\FormRequest;

class AuthChangePasswordRequest extends FormRequest
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
    public function rules(): array
    {
        return [
            'password'        => 'required|confirmed|min:8',
            'recaptcha_token' => ['required', new ReCaptchaRule($this->recaptcha_token)],
        ];
    }

    /**
     * @return string|null
     */
    public function getPassword(): ?string
    {
        return $this->get('password');
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->get('email');
    }
}
