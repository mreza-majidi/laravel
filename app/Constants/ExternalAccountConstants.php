<?php
/**
 * Created by PhpStorm.
 * User: Mehran.Mahmoudi@ZoodFood.Com
 * Date: 14.02.21
 * Time: 16:15
 */

namespace App\Constants;

class ExternalAccountConstants
{
    const MAX_ACCOUNTS_COUNT = 4;

    const TYPE_META_TRADER_5_DEMO = 'META_TRADER_5_DEMO';
    const TYPE_META_TRADER_5_REAL = 'META_TRADER_5_REAL';

    const GROUP_DEMO_VIP = 'demo\ztetrade\VIP';
    const GROUP_DEMO_ECN = 'demo\ztetrade\ECN';
    const GROUP_DEMO_NO_SWAP = 'demo\ztetrade\No_Swap';
    const GROUP_DEMO_TRASH = 'demo\ztetrade\Trash';

    const GROUP_REAL_VIP_LP_1 = 'real\ztetrade\VIP_LP1';
    const GROUP_REAL_VIP_LP_2 = 'real\ztetrade\VIP_LP2';
    const GROUP_REAL_ECN_LP_1 = 'real\ztetrade\ECN_LP1';
    const GROUP_REAL_ECN_LP_2 = 'real\ztetrade\ECN_LP2';
    const GROUP_REAL_NO_SWAP_LP_1 = 'real\ztetrade\No_Swap_LP1';
    const GROUP_REAL_NO_SWAP_LP_2 = 'real\ztetrade\No_Swap_LP2';
    const GROUP_REAL_TRASH = 'real\ztetrade\Trash';

    const DEMO_LEVERAGE_50 = 50;
    const DEMO_LEVERAGE_100 = 100;
    const DEMO_LEVERAGE_200 = 200;

    const DEMO_DEPOSIT_1000 = 1000;
    const DEMO_DEPOSIT_2000 = 2000;
    const DEMO_DEPOSIT_5000 = 5000;
    const DEMO_DEPOSIT_10000 = 10000;
    const DEMO_DEPOSIT_50000 = 50000;

    const REAL_LEVERAGE_50 = 50;
    const REAL_LEVERAGE_100 = 100;
    const REAL_LEVERAGE_200 = 200;

    const REAL_DEPOSIT_1000 = 1000;
    const REAL_DEPOSIT_2000 = 2000;
    const REAL_DEPOSIT_5000 = 5000;
    const REAL_DEPOSIT_10000 = 10000;
    const REAL_DEPOSIT_50000 = 50000;

    const DEMO_ACCOUNTS_START = 2260000;
    const DEMO_ACCOUNTS_END = 2299999;

    const REAL_ACCOUNTS_START = 2200000;
    const REAL_ACCOUNTS_END = 2299999;

    const DEPOSITS_DEMO = [
        self::DEMO_DEPOSIT_1000,
        self::DEMO_DEPOSIT_2000,
        self::DEMO_DEPOSIT_5000,
        self::DEMO_DEPOSIT_10000,
        self::DEMO_DEPOSIT_50000,
    ];

    const LEVERAGES_DEMO = [
        self::DEMO_LEVERAGE_50 => '1.50',
        self::DEMO_LEVERAGE_100 => '1.100',
        self::DEMO_LEVERAGE_200 => '1.200',
    ];

    const DEPOSITS_REAL = [
        self::REAL_DEPOSIT_1000,
        self::REAL_DEPOSIT_2000,
        self::REAL_DEPOSIT_5000,
        self::REAL_DEPOSIT_10000,
        self::REAL_DEPOSIT_50000,
    ];

    const LEVERAGES_REAL = [
        self::REAL_LEVERAGE_50 => '1.50',
        self::REAL_LEVERAGE_100 => '1.100',
        self::REAL_LEVERAGE_200 => '1.200',
    ];

    const GROUPS_DEMO = [
        self::GROUP_DEMO_VIP,
        self::GROUP_DEMO_ECN,
        self::GROUP_DEMO_NO_SWAP,
//        self::GROUP_DEMO_TRASH,
    ];

    const GROUPS_REAL = [
        self::GROUP_REAL_VIP_LP_1,
        self::GROUP_REAL_VIP_LP_2,
        self::GROUP_REAL_ECN_LP_1,
        self::GROUP_REAL_ECN_LP_2,
        self::GROUP_REAL_NO_SWAP_LP_1,
        self::GROUP_REAL_NO_SWAP_LP_2,
//        self::GROUP_REAL_TRASH,
    ];
}
