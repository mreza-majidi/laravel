<?php

namespace App\Models;

use App\Traits\HasUuidTrait;
use EloquentFilter\Filterable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Morilog\Jalali\Jalalian;

/**
 * Class Request
 *
 * @package App\Models
 *
 * @property int       id
 * @property string    uuid
 * @property int       user_id
 * @property string    amount
 * @property string    status
 * @property string    type
 * @property string    description
 * @property int       reference_id
 * @property string    wallet_id
 * @property \DateTime paid_at
 * @property \DateTime created_at
 * @property \DateTime updated_at
 * @property \DateTime deleted_at
 */
class Request extends Model
{
    use HasFactory, SoftDeletes, HasUuidTrait, Filterable;

    protected $hidden = ['id', 'updated_at', 'deleted_at'];

    protected $casts = ['paid_at' => 'datetime'];

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
    public function wallet(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Wallet::class);
    }

    /**
     * @return string
     */
    public function getRouteKeyName(): string
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
    public function getAmount(): string
    {
        return $this->amount;
    }

    /**
     * @param string $amount
     */
    public function setAmount(string $amount): void
    {
        $this->amount = $amount;
    }

    /**
     * @return string
     */
    public function getStatus(): string
    {
        return $this->status;
    }

    /**
     * @param string $status
     */
    public function setStatus(string $status): void
    {
        $this->status = $status;
    }

    /**
     * @param string $type
     */
    public function setType(string $type): void
    {
        $this->type = $type;
    }

    /**
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * @return string|null
     */
    public function getDescription(): ?string
    {
        return $this->description;
    }

    /**
     * @param string|null $description
     */
    public function setDescription(?string $description): void
    {
        $this->description = $description;
    }

    /**
     * @return \DateTime|null
     */
    public function getPaidAt(): ?\DateTime
    {
        return $this->paid_at;
    }

    /**
     * @param \DateTime $paid_at
     */
    public function setPaidAt(\DateTime $paid_at): void
    {
        $this->paid_at = $paid_at;
    }

    /**
     * @return integer|null
     */
    public function getReferenceId(): ?int
    {
        return $this->reference_id;
    }

    /**
     * @param integer $reference_id
     *
     * @return Request
     */
    public function setReferenceId(int $reference_id): Request
    {
        $this->reference_id = $reference_id;

        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getCreatedAt(): \DateTime
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
     * @return Jalalian
     */
    public function getJalaliCreateAt(): string
    {
        return Jalalian::fromCarbon($this->getCreatedAt())->format('Y-m-d');
    }

    /**
     * @return string
     */
    public function getJalaliPaidAt(): string
    {
        return Jalalian::fromCarbon($this->getPaidAt())->format('Y-m-d');
    }

    /**
     * @return string
     */
    public function getWalletId(): string
    {
        return $this->wallet_id;
    }

    /**
     * @param string $wallet_id
     *
     * @return Request
     */
    public function setWalletId(string $wallet_id): Request
    {
        $this->wallet_id = $wallet_id;

        return $this;
    }
}
