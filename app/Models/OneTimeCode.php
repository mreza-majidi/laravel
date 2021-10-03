<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use phpDocumentor\Reflection\DocBlock\StandardTagFactory;

/**
 * Class OneTimeCode
 *
 * @package App\Models
 * @property int       id
 * @property string    email
 * @property string    value
 * @property \DateTime expires_at
 * @property int       send_count
 * @property string    type
 * @property \DateTime used_at
 * @property int       user_id
 * @property \DateTime created_at
 * @property \DateTime updated_at
 */
class OneTimeCode extends Model
{
    use HasFactory;


    protected $casts = [
        'expires_at' => 'datetime',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * @param string $email
     *
     * @return OneTimeCode
     */
    public function setEmail(string $email): OneTimeCode
    {
        $this->email = $email;

        return $this;
    }

    /**
     * @return string
     */
    public function getValue(): string
    {
        return $this->value;
    }

    /**
     * @param string $value
     *
     * @return OneTimeCode
     */
    public function setValue(string $value): OneTimeCode
    {
        $this->value = $value;

        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getExpiresAt(): \DateTime
    {
        return $this->expires_at;
    }

    /**
     * @param \DateTime $expires_at
     *
     * @return OneTimeCode
     */
    public function setExpiresAt(\DateTime $expires_at): OneTimeCode
    {
        $this->expires_at = Carbon::parse($expires_at);

        return $this;
    }

    /**
     * @return int
     */
    public function getSendCount(): int
    {
        return $this->send_count;
    }

    /**
     * @param int $send_count
     *
     * @return OneTimeCode
     */
    public function setSendCount(int $send_count): OneTimeCode
    {
        $this->send_count = $send_count;

        return $this;
    }

    /**
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * @param string $type
     *
     * @return OneTimeCode
     */
    public function setType(string $type): OneTimeCode
    {
        $this->type = $type;

        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getUsedAt(): \DateTime
    {
        return $this->used_at;
    }

    /**
     * @param \DateTime $used_at
     *
     * @return OneTimeCode
     */
    public function setUsedAt(\DateTime $used_at): OneTimeCode
    {
        $this->used_at = $used_at;

        return $this;
    }

    /**
     * @return int
     */
    public function getUserId(): int
    {
        return $this->user_id;
    }

    /**
     * @param int $user_id
     *
     * @return OneTimeCode
     */
    public function setUserId(int $user_id): OneTimeCode
    {
        $this->user_id = $user_id;

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
