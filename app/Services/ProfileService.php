<?php

namespace App\Services;

use App\Models\Profile;
use App\Models\User;

/**
 * Class ProfileService
 *
 * @package App\Services
 */
class ProfileService extends BaseService
{

    /**
     * @param array $parameters
     *
     * @return mixed
     */
    public function index(array $parameters)
    {
        $user = $parameters['user'];

        return $user->profile()->first();
    }

    /**
     * @param array $parameters
     */
    public function update(array $parameters)
    {
        $profile                  = $parameters['profile'];
        $userId                   = $profile->getUserId();
        $profile->first_name      = $parameters['first_name'];
        $profile->last_name       = $parameters['last_name'];
        $profile->mobile_number   = $parameters['mobile_number'];
        $profile->address         = $parameters['address'];
        $profile->national_number = $parameters['national_number'];
        $profile->birth_date      = $parameters['birth_date'];
        $profile->save();

        if ($parameters['has_avatar']) {
            $avatarFile = $parameters['avatar'];
            uploadService()->uploadFileWithOwner($avatarFile, $profile->refresh());
        }

        $user = User::query()->where('id', $userId)->first();
        $user->setIsCompleted(1);
        $user->save();
    }
}
