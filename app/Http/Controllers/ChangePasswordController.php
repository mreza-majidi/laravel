<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserChangePasswordRequest;
use App\Models\User;
use App\Services\UserService;
use Hash;

class ChangePasswordController extends Controller
{

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        return view('user.user-profile.reset-password');
    }

    /**
     * @param UserChangePasswordRequest $request
     *
     * @return array|\Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\Translation\Translator|string|null
     */
    public function changePassword(UserChangePasswordRequest $request)
    {
        $user       = auth()->user();
        $parameters = [
            'old_password' => $request->getOldPassword(),
            'new_password' => $request->getNewPassword(),
        ];
        $result     = userService()->changePassword($parameters, $user);
        if ($result == UserService::OLD_PASSWORD_NOT_MATCH) {
            alert()->warning(__('messages.change_password.confirm_old_password'));
        }
        if ($result == UserService::NEW_PASSWORD_NOT_LIKE_TO_OLD_PASSWORD) {
            alert()->warning(__('messages.change_password.new_password'));
        }
        if ($result == UserService::SUCCESS) {
            alert()->success(__('messages.change_password.update_password'));
        }

        return back();
    }
}
