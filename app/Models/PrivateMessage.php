<?php

namespace App\Models;

use App\Traits\HasUuidTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;
use Morilog\Jalali\Jalalian;

/**
 * Class PrivateMessage
 *
 * @package App\Models
 *
 * @property int       id
 * @property string    uuid
 * @property int       user_id
 * @property string    title
 * @property string    text
 * @property boolean   seen
 * @property \DateTime created_at
 * @property \DateTime updated_at
 * @property \DateTime deleted_at
 */
class PrivateMessage extends Model
{
    use HasFactory, SoftDeletes, HasUuidTrait;

    protected $guarded = ['id'];

    protected $hidden = ['id', 'updated_at', 'deleted_at'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * @return string
     */
    public function getRouteKeyName()
    {
        return 'uuid';
    }

    /**
     * @return integer
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getUuid(): string
    {
        return $this->uuid;
    }

    /**
     * @return integer
     */
    public function getUserId(): int
    {
        return $this->user_id;
    }

    /**
     * @param integer $user_id
     */
    public function setUserId(int $user_id): void
    {
        $this->user_id = $user_id;
    }

    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @param string $title
     */
    public function setTitle(string $title): void
    {
        $this->title = $title;
    }

    /**
     * @return string
     */
    public function getText(): string
    {
        return $this->text;
    }

    /**
     * @param string $text
     */
    public function setText(string $text): void
    {
        $this->text = $text;
    }

    /**
     * @return boolean
     */
    public function isSeen(): bool
    {
        return $this->seen;
    }

    /**
     * @param boolean $seen
     */
    public function setSeen(bool $seen): void
    {
        $this->seen = $seen;
    }

    /**
     * @return \DateTime|null
     */
    public function getCreatedAt(): ?\DateTime
    {
        return $this->created_at;
    }

    /**
     * @return \DateTime
     */
    public function getUpdatedAt(): \DateTime
    {
        return $this->updated_at;
    }

    /**
     * @return \DateTime
     */
    public function getDeletedAt(): \DateTime
    {
        return $this->deleted_at;
    }


    /**
     * @return string
     */
    public function getJalaliCreatedAt(): string
    {
        if ($this->getCreatedAt()) {
            return Jalalian::fromCarbon($this->getCreatedAt())->format('Y-m-d  H:m');
        }

        return '';
    }

    /**
     * @return string
     */
    public function getTextLimited(): string
    {
        return Str::limit($this->getText(), 5);
    }
}
