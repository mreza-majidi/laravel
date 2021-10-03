<?php

namespace App\Constants;

class OneTimePasswordConstants
{
    const TYPE_EMAIL_VERIFICATION = 'email_verification';
    const TYPE_FORGOT_PASSWORD    = 'forgot_password';


    public static array $type =
        [
            self::TYPE_EMAIL_VERIFICATION,
            self::TYPE_FORGOT_PASSWORD,
        ];
}
