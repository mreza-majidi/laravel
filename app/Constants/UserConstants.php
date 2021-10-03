<?php

namespace App\Constants;

class UserConstants
{
    const STATUS_ACTIVE  = 'active';
    const STATUS_SUSPEND = 'suspend';


    public static array $statuses =
        [
            self::STATUS_ACTIVE,
            self::STATUS_SUSPEND,
        ];

}

