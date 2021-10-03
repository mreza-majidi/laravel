<?php

namespace App\Http\Controllers\Api\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserChangePasswordRequest;
use App\Models\User;
use App\Services\UserService;
use Auth;
use Hash;

class ChangePasswordController extends Controller
{
    /**
     * @param UserChangePasswordRequest $request
     * @param User                      $user
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function changePassword(UserChangePasswordRequest $request, User $user): \Illuminate\Http\JsonResponse
    {
        $parameters = [
            'old_password' => $request->getOldPassword(),
            'new_password' => $request->getNewPassword(),
        ];
        $result     = userService()->changePassword($parameters, $user);

        if ($user == UserService::OLD_PASSWORD_NOT_MATCH) {
            return $this->error(__('messages.change_password.confirm_old_password'), 400);
        }
        if ($user == UserService::NEW_PASSWORD_NOT_LIKE_TO_OLD_PASSWORD) {
            return $this->error(__('messages.change_password.new_password'), 400);
        }

        return $this->success(__('messages.change_password.update_password'));
    }
}
