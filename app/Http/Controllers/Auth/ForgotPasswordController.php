<?php

namespace App\Http\Controllers\Auth;

use App\Events\ForgotPassword;
use App\Http\Controllers\Controller;
use App\Http\Requests\AuthChangePasswordRequest;
use App\Http\Requests\AuthForgotPasswordRequest;
use App\Models\OneTimeCode;
use App\Models\User;
use Carbon\Carbon;

class ForgotPasswordController extends Controller
{

    /**
     * @param AuthForgotPasswordRequest $request
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function sendForgotPasswordLink(AuthForgotPasswordRequest $request): \Illuminate\Http\RedirectResponse
    {
        $user    = User::query()->where('email', $request->getEmail());
        $message = __('messages.forgot_password_email.success');
        session()->flash('uri', 'forgot-password');
        if ($user->exists()) {
            event(new ForgotPassword($user->first()));

            return redirect()->route('website.web.user.auth')->with('message', $message);
        }

        return redirect()->route('website.web.user.auth')->with('message', $message);
    }

    /**
     * @param string $code
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function checkForgotPasswordLink(string $code)
    {
        if ($this->isOneTimePassword($code)) {
            $email = $this->find($code)->first()->email;

            return view('auth.login', compact('email'));
        }
        $message = __('messages.forgot_password_email.expire_link');

        return view('auth.login', compact('message'));
    }

    /**
     * @param AuthChangePasswordRequest $request
     * @param string                    $code
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function changePassword(AuthChangePasswordRequest $request, string $code): \Illuminate\Http\RedirectResponse
    {
        $oneTimePassword = $this->find($code)->first();

        if ($oneTimePassword) {
            $user_id = $oneTimePassword->getUserId();
            $user    = User::query()->where('id', $user_id)->first();
            if ($user->exists()) {
                $user->setPassword(bcrypt($request->getPassword()));
                $user->save();
                $this->setUsedOneTimePassword($code);

                $message = __('messages.change_password.success');

                return redirect()->route('website.web.user.auth')->with('message', $message);
            }
        } else {
            $message = __('messages.forgot_password_email.check_link');

            return redirect()->route('website.web.user.auth')->with('message', $message);
        }

        $message = __('messages.change_password.fail');

        return redirect()->route('website.web.user.auth')->with('message', $message);
    }


    /**
     * @param string $code
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    private function find(string $code): \Illuminate\Database\Eloquent\Builder
    {
        return OneTimeCode::query()
                          ->where('value', $code)
                          ->where('expires_at', '>=', Carbon::now())
                          ->where('used_at', null)
            ;
    }

    /**
     * @param string $code
     *
     * @return boolean
     */
    private function isOneTimePassword(string $code): bool
    {
        return $this->find($code)->exists();
    }

    /**
     * @param string $code
     *
     * @return boolean
     */
    private function setUsedOneTimePassword(string $code): bool
    {
        $updateOtc = $this->find($code)->first();
        $updateOtc->setUsedAt(Carbon::now());

        return $updateOtc->save();
    }
}
