<?php

namespace App\Http\Requests;

use App\Rules\ReCaptchaRule;
use Illuminate\Foundation\Http\FormRequest;

class VerificationRequest extends FormRequest
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
        return ['code' => 'required'];
    }

    /**
     * @return mixed
     */
    public function getCode()
    {
        return $this->get('code');
    }
}
