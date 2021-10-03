<?php


namespace App\Traits;

use Illuminate\Support\Str;

trait HasUuidTrait
{
    protected static function bootHasUuidTrait()
    {
        static::creating(function ($model) {
            $model->uuid = (string)Str::uuid();
        });
    }

    /**
     * @param string $uuid
     *
     * @return self
     */
    public static function findByUuid(string $uuid)
    {
        return self::query()->where('uuid', $uuid)->first();
    }

    /**
     * @param string $uuid
     *
     * @return int
     */
    public static function findIdByUuid(string $uuid)
    {
        return self::findByUuid($uuid)->id;
    }

}
