<?php

namespace App\Http\Requests;

use App\Constants\RequestConstants;
use Illuminate\Foundation\Http\FormRequest;

class RequestStoreRequest extends FormRequest
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
        $type = implode(',', RequestConstants::$type);

        return [
            'amount'      => 'required|integer|min:0|max:18446744073709551615',
            'type'        => 'required|in:'.$type,
            'wallet_id'   => 'required|exists:wallets,uuid',
            'description' => 'string|nullable',
        ];
    }

    /**
     * @return mixed
     */
    public function getAmout()
    {
        return $this->get('amount');
    }

    /**
     * @return mixed
     */
    public function getType()
    {
        return $this->get('type');
    }

    /**
     * @return mixed
     */
    public function getDescription()
    {
        return $this->get('description');
    }

    /**
     * @return mixed
     */
    public function getWalletId()
    {
        return $this->get('wallet_id');
    }
}
