<?php

namespace App\Constants;

class RequestConstants
{
    const TYPE_DEPOSIT  = 'deposit';
    const TYPE_WITHDRAW = 'withdraw';

    const REQUEST_STATUS_PENDING  = 'pending';
    const REQUEST_STATUS_ACCEPTED = 'accepted';
    const REQUEST_STATUS_REJECTED = 'rejected';

    public static array $type =
        [
            self::TYPE_DEPOSIT,
            self::TYPE_WITHDRAW,
        ];

    public static array $REQUEST_STATUSES =
        [
            self::REQUEST_STATUS_ACCEPTED,
            self::REQUEST_STATUS_PENDING,
            self::REQUEST_STATUS_REJECTED,
        ];
}
