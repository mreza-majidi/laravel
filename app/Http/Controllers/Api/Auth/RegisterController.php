<?php

namespace App\Http\Controllers\Api\Auth;

use App\Events\NewUserVerification;
use App\Http\Controllers\Controller;
use App\Http\Requests\AuthRegisterRequest;
use App\Http\Resources\RegisterResource;
use App\Http\Resources\UserResource;
use App\Models\User;

class RegisterController extends Controller
{
    public function register(AuthRegisterRequest $request)
    {
        $user = new User();
        $user->setEmail($request->getEmail());
        $user->setPassword(bcrypt($request->getPassword()));
        $check = $user->save();
        if ($check) {
            event(new NewUserVerification($user));

            return $this->success(['message' => __('messages.register.success')]);
        } else {
            return $this->error(__('messages.register.error'), 500);
        }
    }
}
