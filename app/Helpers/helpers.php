<?php

use Morilog\Jalali\Jalalian;

if (!function_exists('requestService')) {
    /**
     * @return \App\Services\RequestService
     */
    function requestService(): \App\Services\RequestService
    {
        return resolve('RequestService');
    }
}

if (!function_exists('profileService')) {
    /**
     * @return \App\Services\ProfileService
     */
    function profileService(): \App\Services\ProfileService
    {
        return resolve('ProfileService');
    }
}

if (!function_exists('walletService')) {
    /**
     * @return \App\Services\WalletService
     */
    function walletService(): \App\Services\WalletService
    {
        return resolve('WalletService');
    }
}

if (!function_exists('privateMessageService')) {
    /**
     * @return \App\Services\PrivateMessageService
     */
    function privateMessageService(): \App\Services\PrivateMessageService
    {
        return resolve('PrivateMessageService');
    }
}

if (!function_exists('documentService')) {
    /**
     * @return \App\Services\DocumentService
     */
    function documentService(): \App\Services\DocumentService
    {
        return resolve('DocumentService');
    }
}

if (!function_exists('userService')) {
    /**
     * @return \App\Services\UserService
     */
    function userService(): \App\Services\UserService
    {
        return resolve('UserService');
    }
}

if (!function_exists('fileService')) {
    /**
     * @return \App\Services\FileManagement\FileService
     */
    function fileService(): \App\Services\FileManagement\FileService
    {
        return resolve('FileService');
    }
}

if (!function_exists('uploadService')) {
    /**
     * @return \App\Services\UploadService
     */
    function uploadService(): \App\Services\UploadService
    {
        return resolve('UploadService');
    }
}

if (!function_exists('generateRandomString')) {
    /**
     * @param integer $length
     *
     * @return string
     */
    function generateRandomString(int $length = 6): string
    {
        $characters       = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString     = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }

        return $randomString;
    }
}

if (!function_exists('announcementService')) {
    /**
     * @return \App\Services\AnnouncementService
     */
    function announcementService(): \App\Services\AnnouncementService
    {
        return resolve('AnnouncementService');
    }
}

if (!function_exists('convertJalaliToCarbon')) {
    /**
     * @param string $date
     *
     * @return \Carbon\Carbon
     */
    function convertJalaliToCarbon(string $date): \Carbon\Carbon
    {
        return Jalalian::fromFormat('Y/m/d', $date)->toCarbon();
    }
}

if (!function_exists('convertDateTimeToJalali')) {
    /**
     * @param string $date
     *
     * @return string
     */
    function convertDateTimeToJalali(string $date): string
    {
        return Jalalian::fromDateTime($date)->format('Y/m/d');
    }
}

if (!function_exists('metaTraderService')) {
    /**
     * @return \App\Services\MetaTraderService
     */
    function metaTraderService(): \App\Services\MetaTraderService
    {
        return resolve('MetaTraderService');
    }
}
