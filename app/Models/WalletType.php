<?php

namespace App\Models;

use App\Traits\HasUUIDTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class WalletType
 *
 * @package App\Models
 *
 * @property int       id
 * @property string    uuid
 * @property string    title
 * @property \DateTime updated_at
 * @property \DateTime deleted_at
 */
class WalletType extends Model
{
    use HasFactory, HasUUIDTrait;

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function wallets()
    {
        return $this->hasMany(Wallet::class);
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
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @param string $title
     *
     * @return WalletTypes
     */
    public function setTitle(string $title): WalletType
    {
        $this->title = $title;

        return $this;
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
}
