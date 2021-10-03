<?php

namespace App\Models;

use App\Constants\UserConstants;
use App\Traits\HasUuidTrait;
use App\Traits\InteractsWithMediaTrait;
use App\Traits\InteractsWithRoleTrait;
use EloquentFilter\Filterable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;
use phpDocumentor\Reflection\Types\Boolean;

/**
 * Class User
 *
 * @package App\Models
 *
 * @property integer id
 * @property string uuid
 * @property string email
 * @property \DateTime email_verified_at
 * @property string password
 * @property boolean is_completed
 * @property string status
 * @property \DateTime created_at
 * @property \DateTime updated_at
 * @property \DateTime deleted_at
 * @property Profile profile
 */
class User extends Authenticatable
{
    use HasFactory, Notifiable, HasUuidTrait, SoftDeletes, HasApiTokens, Filterable, InteractsWithRoleTrait, InteractsWithMediaTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'status',
        'email_verified_at',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'id',
        'password',
        'remember_token',
    ];

    /**
     * @var string[]
     */
    protected $casts = ['email_verified_at' => 'datetime'];

    /**
     * @return string
     */
    public function getRouteKeyName()
    {
        return 'uuid';
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function wallets(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Wallet::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function documents(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Document::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function documentsWithTypeAndMedia(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->documents()->with('documentType', 'media');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function extrnalAccounts(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(ExternalAccount::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function privateMessages(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(PrivateMessage::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function requests(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Request::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function makeOrFindProfile(): \Illuminate\Database\Eloquent\Relations\HasOne
    {
        if ($this->profile()->first('id') == null) {
            $this->profile()->create();
        }

        return $this->profile();
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function profile(): \Illuminate\Database\Eloquent\Relations\HasOne
    {
        return $this->hasOne(Profile::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function oneTimeCode(): \Illuminate\Database\Eloquent\Relations\HasOne
    {
        return $this->hasOne(OneTimeCode::class);
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
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * @param string $email
     */
    public function setEmail(string $email): void
    {
        $this->email = $email;
    }

    /**
     * @return boolean
     */
    public function isEmailVerified(): bool
    {
        return boolval($this->getEmailVerifiedAt());
    }

    /**
     * @return \DateTime
     */
    public function getEmailVerifiedAt()
    {
        return $this->email_verified_at;
    }

    /**
     * @param \DateTime $email_verified_at
     */
    public function setEmailVerifiedAt(\DateTime $email_verified_at): void
    {
        $this->email_verified_at = $email_verified_at;
    }

    /**
     * @return string
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    /**
     * @param string $password
     */
    public function setPassword(string $password): void
    {
        $this->password = $password;
    }

    /**
     * @return string
     */
    public function getStatus(): string
    {
        return $this->status;
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
     * @return boolean
     */
    public function setVerificationStatus(): bool
    {
        $this->setStatus(UserConstants::STATUS_ACTIVE);

        return $this->save();
    }

    /**
     * @param string $status
     */
    public function setStatus(string $status): void
    {
        $this->status = $status;
    }

    /**
     * @return string|null
     */
    public function getFullName(): ?string
    {
        if ($this->profile) {
            /** @var Profile $profile */
            $profile = $this->profile()->first(['first_name', 'last_name']);

            return $profile->getFirstName()." ".$profile->getLastName();
        }

        return '';
    }

    /**
     * @return boolean
     */
    public function isActive(): bool
    {
        return $this->status == UserConstants::STATUS_ACTIVE ? true : false;
    }

    /**
     * @return boolean|null
     */
    public function getIsCompleted(): ?bool
    {
        return $this->is_completed;
    }

    /**
     * @param boolean $is_completed
     *
     * @return User
     */
    public function setIsCompleted(bool $is_completed): User
    {
        $this->is_completed = $is_completed;

        return $this;
    }
}
