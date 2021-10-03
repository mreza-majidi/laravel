<?php

namespace App\Models;

use App\Constants\FileConstants;
use App\Interfaces\DirectoryNamerInterface;
use App\Traits\HasUuidTrait;
use App\Traits\InteractsWithMediaTrait;
use DateTime;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Media
 * @package App\Models
 *
 * @property int id
 * @property string entity_type
 * @property int entity_id
 * @property string uuid
 * @property string file_name
 * @property string extension
 * @property string collection
 * @property string size
 * @property string disk
 * @property DateTime created_at
 * @property DateTime updated_at
 */
class Media extends Model
{
    use HasFactory, HasUuidTrait, SoftDeletes;

    /**
     * @return MorphTo
     */
    public function entity(): MorphTo
    {
        return $this->morphTo();
    }

    /**
     * @return string
     */
    public function getAbsolutePath(): string
    {
        return public_path($this->getRelativePath());
    }

    /**
     * @return string
     */
    public function getRelativePath(): string
    {
        return \sprintf('%s%s%s', FileConstants::SYMLINK_DIRECTORY_NAME, DIRECTORY_SEPARATOR, $this->getPathFromFileName());
    }

    /**
     * It's just a wrapper for getRelativePath function
     *
     * @return string
     */
    public function getRelativeUrl(): string
    {
        return str_replace(DIRECTORY_SEPARATOR, '/', $this->getRelativePath());
    }

    /**
     * @return string
     */
    public function getAbsoluteUrl(): string
    {
        return str_replace(DIRECTORY_SEPARATOR, '/', url($this->getRelativePath()));
    }

    /**
     * @return string
     */
    public function getBasePathFromFileName(): string
    {
        return app(DirectoryNamerInterface::class)->getPathFromFileName($this->file_name);
    }

    /**
     * @return string
     */
    public function getRelativeBasePathFromFileName(): string
    {
        return \sprintf('%s%s%s', FileConstants::SYMLINK_DIRECTORY_NAME, DIRECTORY_SEPARATOR, $this->getBasePathFromFileName());
    }

    /**
     * @return string
     */
    public function getPathFromFileName(): string
    {
        return \sprintf('%s%s%s', $this->getBasePathFromFileName(), DIRECTORY_SEPARATOR, $this->file_name);
    }

    /**
     * @return string
     */
    public function getFileNameWithoutExtension(): string
    {
        return pathinfo($this->getRelativePath(), PATHINFO_FILENAME);
    }

    /**
     * @return string
     */
    public function getThumbnailAbsolutePath(): string
    {
        return public_path($this->getThumbnailRelativePath());
    }

    /**
     * @return string
     */
    public function getThumbnailFileName(): string
    {
        return \sprintf('%s_%s.%s', FileConstants::THUMBNAIL_PREFIX, $this->getFileNameWithoutExtension(), $this->extension);
    }

    /**
     * @return string
     */
    public function getThumbnailRelativePath(): string
    {
        return \sprintf('%s%s%s', $this->getRelativeBasePathFromFileName(), DIRECTORY_SEPARATOR, $this->getThumbnailFileName());
    }

    /**
     * Provide a model which uses InteractsWithMedia trait
     *
     * @param Model $owner
     *
     * @throws \InvalidArgumentException
     */
    public function attachOwner(Model $owner)
    {
        if (uploadService()->checkInteractsWithMediaTrait($owner)) {
            $owner->media()->save($this);
        } else {
            throw new \InvalidArgumentException(\sprintf('The %s class is not using %s trait.', \get_class($owner), InteractsWithMediaTrait::class));
        }
    }
}
