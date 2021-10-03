<?php


namespace App\Constants;

class FileConstants
{
    const PUBLIC_DIRECTORY = '';
    const TEMPORARY_PATH   = self::PUBLIC_DIRECTORY.'tmp/%s/';
    const PERMANENT_PATH   = self::PUBLIC_DIRECTORY.'%s/';

    const SYMLINK_DIRECTORY_NAME = 'storage';

    const THUMBNAIL_WIDTH  = 162;
    const THUMBNAIL_HEIGHT = 162;
    const THUMBNAIL_PREFIX = 'thumb';
}
