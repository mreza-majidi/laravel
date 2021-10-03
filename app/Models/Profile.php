<?php

namespace App\Models;

use App\Traits\HasUuidTrait;
use App\Traits\InteractsWithMediaTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class self
 *
 * @package App\Models
 *
 * @property integer   id
 * @property string    uuid
 * @property integer   user_id
 * @property string    first_name
 * @property string    last_name
 * @property string    mobile_number
 * @property string    national_number
 * @property string    address
 * @property string    avatar
 * @property \DateTime birth_date
 * @property \DateTime created_at
 * @property \DateTime updated_at
 */
class Profile extends Model
{
    use HasFactory, HasUuidTrait, InteractsWithMediaTrait;

    protected $casts = ['birth_date' => 'datetime'];

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
    public function getRouteKeyName(): string
    {
        return "uuid";
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
     *
     * @return self
     */
    public function setUserId(int $user_id): self
    {
        $this->user_id = $user_id;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getFirstName(): ?string
    {
        return $this->first_name;
    }

    /**
     * @param string $first_name
     *
     * @return self
     */
    public function setFirstName(string $first_name): self
    {
        $this->first_name = $first_name;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getLastName(): ?string
    {
        return $this->last_name;
    }

    /**
     * @param string $last_name
     *
     * @return self
     */
    public function setLastName(string $last_name): self
    {
        $this->last_name = $last_name;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getMobileNumber(): ?string
    {
        return $this->mobile_number;
    }

    /**
     * @param string $mobile_number
     *
     * @return self
     */
    public function setMobileNumber(string $mobile_number): self
    {
        $this->mobile_number = $mobile_number;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getNationalNumber(): ?string
    {
        return $this->national_number;
    }

    /**
     * @param string $national_number
     *
     * @return self
     */
    public function setNationalNumber(string $national_number): self
    {
        $this->national_number = $national_number;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getAddress(): ?string
    {
        return $this->address;
    }

    /**
     * @param string $address
     *
     * @return self
     */
    public function setAddress(string $address): self
    {
        $this->address = $address;

        return $this;
    }

    /**
     * @return string
     */
    public function getAvatar(): string
    {
        return $this->media()->first() ? $this->media()->first()->getAbsoluteUrl() : '/assets/media/users/default.jpg';
    }


    /**
     * @return \DateTime|null
     */
    public function getBirthDate(): ?\DateTime
    {
        return $this->birth_date;
    }

    /**
     * @param \DateTime $birth_date
     *
     * @return self
     */
    public function setBirthDate(\DateTime $birth_date): self
    {
        $this->birth_date = $birth_date;

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
}
