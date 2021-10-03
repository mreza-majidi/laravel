<?php

namespace App\Http\Controllers\Api\User;

use App\Http\Controllers\Controller;
use App\Http\Resources\WalletResource;
use Auth;

class WalletController extends Controller
{

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function getWallets(): \Illuminate\Http\JsonResponse
    {
        $user = Auth::guard('api')->user();

        $parameter = [
            'user_id' => $user->id,
        ];
        $wallets   = walletService()->getWallets($parameter);

        return $this->success($wallets);
    }
}
