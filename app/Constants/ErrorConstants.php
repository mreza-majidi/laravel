<?php
/**
 * Created by PhpStorm.
 * User: Mehran.Mahmoudi@ZoodFood.Com
 * Date: 01.02.21
 * Time: 09:59
 */

namespace App\Constants;

/**
 * Class ErrorConstants
 * @package App\Constants
 */
class ErrorConstants
{
    const NO_MORE_USERNAME_AVAILABLE = 1000;

    const LABELS = [
        self::NO_MORE_USERNAME_AVAILABLE => 'No more MetaTrader5 username available to register, please contact your system support.',
    ];
}
