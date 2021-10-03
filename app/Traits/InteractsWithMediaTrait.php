<?php

namespace App\Traits;

use App\Jobs\ClearDeletedEntityMediaJob;
use App\Models\Media;
use Illuminate\Database\Eloquent\Relations\MorphMany;

/**
 * Trait InteractsWithMedia
 *
 * @package App\Traits
 */
trait InteractsWithMediaTrait
{
    /**
     *
     */
    protected static function booted()
    {
        parent::booted();
        static::deleted(function (self $object) {
            dispatch(new ClearDeletedEntityMediaJob(get_class($object), $object->id));
        });
    }

    /**
     * @return MorphMany
     */
    public function media(): MorphMany
    {
        return $this->morphMany(Media::class, 'entity');
    }

    /**
     * @param string $collection
     *
     * @return MorphMany
     */
    public function getMediaOnCollection(string $collection = 'default'): MorphMany
    {
        return $this->media()->where('collection', $collection);
    }

    /**
     * @param string $extension
     *
     * @return MorphMany
     */
    public function getMediaByExtension(string $extension): MorphMany
    {
        return $this->media()->where('extension', strtolower($extension));
    }
}
