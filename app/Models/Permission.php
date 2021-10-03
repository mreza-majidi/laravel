<?php

namespace App\Models;

use App\Traits\HasUUIDTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

/**
 * Class Permission
 * @package App\Models
 *
 * @property integer   id
 * @property string    uuid
 * @property string    title
 * @property string    action
 * @property \DateTime created_at
 * @property \DateTime updated_at
 */
class Permission extends Model
{
    use HasUUIDTrait;

    protected $hidden = ['id'];

    /**
     * The roles that belong to the permission.
     *
     * @return BelongsToMany
     */
    public function roles(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
    {
        return $this->belongsToMany(Role::class);
    }

    /**
     * @return string
     */
    public function getRouteKeyName(): string
    {
        return 'uuid';
    }
}
