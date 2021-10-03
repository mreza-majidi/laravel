<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\AuthLoginRequest;
use App\Traits\ApiResponser;
use Auth;
use Illuminate\Http\Request;
use Laravel\Passport\Passport;

class LoginController extends Controller
{

    public function login(AuthLoginRequest $request)
    {
        if (Auth::attempt($request->getEmailAndPassword())) {
            if (auth()->user()->isEmailVerified()) {
                $token = auth()->user()->createToken('Token')->accessToken;

                return $this->success(['token' => $token], __('messages.login.Success'));
            } else {
                return $this->error(['message' => __('messages.login.account_verified')], 403);
            }
        } else {
            return $this->error(__('messages.login.error'), 401);
        }
    }
}
