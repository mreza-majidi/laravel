<?php

namespace App\Http\Controllers\Api\Auth;

use App\Events\ForgotPassword;
use App\Http\Controllers\Controller;
use App\Http\Requests\AuthChangePasswordRequest;
use App\Http\Requests\AuthForgotPasswordRequest;
use App\Models\OneTimeCode;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ForgotPasswordController extends Controller
{

    public function sendForgotPasswordLink(AuthForgotPasswordRequest $request)
    {
        $user = User::query()->where('email', $request->getEmail());

        if ($user->exists()) {
            event(new ForgotPassword($user->first()));

            return $this->success(__('messages.forgot_password_email.success'));
        }

        return $this->success(__('messages.forgot_password_email.success'));
    }

    public function checkForgotPasswordLink($code)
    {
        if ($this->isOneTimePassword($code)) {
            return $this->success(['email' => $this->find($code)->first()->email]);
        } else {
            return $this->error(__('messages.forgot_password_email.expire_link'), 200);
        }
    }

    public function changePassword(AuthChangePasswordRequest $request, $code)
    {
        $oneTimePassword = $this->find($code)->first();

        if ($oneTimePassword) {
            $user_id         = $oneTimePassword->getUserId();
            $user = User::query()->where('id', $user_id)->first();
            if ($user->exists()) {
                $user->setPassword(bcrypt($request->getPassword()));
                $user->save();
                $this->setUsedOneTimePassword($code);

                return $this->success(__('messages.change_password.success'));
            }
        }else{
            return $this->error(__('messages.forgot_password_email.check_link'), 400);
        }

        return $this->error(__('messages.change_password.fail'), 400);
    }


    private function find($code)
    {
        return OneTimeCode::query()
                          ->where('value', $code)
                          ->where('expires_at', '>=', Carbon::now())
                          ->where('used_at', null)
            ;
    }

    private function isOneTimePassword($code)
    {
        return $this->find($code)->exists();
    }

    private function setUsedOneTimePassword($code): bool
    {
        $updateOtc = $this->find($code)->first();
        $updateOtc->setUsedAt(Carbon::now());

        return $updateOtc->save();
    }

}
