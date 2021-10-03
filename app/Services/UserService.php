<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Support\Facades\Hash;

/**
 * Class UserService
 *
 * @package App\Services
 */
class UserService extends BaseService
{

    const OLD_PASSWORD_NOT_MATCH                = 'incorrected_password';
    const NEW_PASSWORD_NOT_LIKE_TO_OLD_PASSWORD = 'new_password_should_not_like_current';
    const SUCCESS                               = 'password_saved';

    /**
     * @param array $parameter
     * @param User  $user
     *
     * @return string
     */
    public function changePassword(array $parameter, User $user): string
    {
        if (!Hash::check($parameter['old_password'], $user->password)) {
            return self::OLD_PASSWORD_NOT_MATCH;
        }
        if (Hash::check($parameter['new_password'], $user->password)) {
            return self::NEW_PASSWORD_NOT_LIKE_TO_OLD_PASSWORD;
        }
        $user->setPassword(bcrypt($parameter['new_password']));
        $user->save();

        return self::SUCCESS;
    }
}
