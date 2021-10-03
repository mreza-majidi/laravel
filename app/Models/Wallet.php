<?php

namespace App\Models;

use App\Traits\HasUuidTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Wallet
 *
 * @package App\Models
 *
 * @property int       id
 * @property string    uuid
 * @property int       user_id
 * @property int       wallet_type_id
 * @property int       balance
 * @property \DateTime created_at
 * @property \DateTime updated_at
 * @property \DateTime deleted_at
 */
class Wallet extends Model
{
    use HasFactory, HasUuidTrait;

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
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function requests(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Request::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function walletType(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(WalletType::class);
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
    public function getWalletTypeId(): int
    {
        return $this->wallet_type_id;
    }

    /**
     * @param integer $wallet_type_id
     *
     * @return Wallet
     */
    public function setWalletTypeId(int $wallet_type_id): Wallet
    {
        $this->wallet_type_id = $wallet_type_id;

        return $this;
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
    public function getUserId(): int
    {
        return $this->user_id;
    }

    /**
     * @return integer
     */
    public function getBalance(): int
    {
        return $this->balance;
    }

    /**
     * @param integer $balance
     */
    public function setBalance(int $balance): void
    {
        $this->balance = $balance;
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
}
