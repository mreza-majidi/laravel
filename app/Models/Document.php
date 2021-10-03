<?php

namespace App\Models;

use App\Traits\HasUuidTrait;
use App\Traits\InteractsWithMediaTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use phpDocumentor\Reflection\Types\Boolean;

/**
 * Class Document
 *
 * @package App\Models
 *
 * @property integer   id
 * @property string    uuid
 * @property integer   user_id
 * @property integer   document_type_id
 * @property boolean   is_verified
 * @property \DateTime created_at
 * @property \DateTime updated_at
 * @property \DateTime deleted_at
 */
class Document extends Model
{
    use HasFactory, SoftDeletes, HasUuidTrait, InteractsWithMediaTrait;


    protected $hidden = ['id', 'updated_at', 'deleted_at'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function documentType(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(DocumentType::class);
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
     * @return integer
     */
    public function getDocumentTypeId(): int
    {
        return $this->document_type_id;
    }

    /**
     * @param integer $document_type_id
     */
    public function setDocumentTypeId(int $document_type_id): void
    {
        $this->document_type_id = $document_type_id;
    }

    /**
     * @return boolean|null
     */
    public function isVerified(): ?bool
    {
        return $this->is_verified;
    }

    /**
     * @param boolean $is_verified
     */
    public function setIsVerified(bool $is_verified): void
    {
        $this->is_verified = $is_verified;
    }

    /**
     * @return \DateTime
     */
    public function getCreatedAt(): \DateTime
    {
        return $this->created_at;
    }
}
