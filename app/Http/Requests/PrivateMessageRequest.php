<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PrivateMessageRequest extends FormRequest
{
    /**
     *
     * @return boolean
     *
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
            'title' => 'required|string',
            'text'  => 'required|string',
            'user'  => 'required|exists:users,uuid',
        ];
    }

    /**
     * @return mixed
     */
    public function getTitle()
    {
        return $this->get('title');
    }

    /**
     * @return mixed|string|null
     */
    public function getUser()
    {
        return $this->get('user');
    }

    /**
     * @return mixed
     */
    public function getText()
    {
        return $this->get('text');
    }
}
