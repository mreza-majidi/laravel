<?php

namespace App\Models;

use App\Traits\HasUuidTrait;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Role
 *
 * @package App
 *
 * @property integer id
 * @property string  uuid
 * @property string  name
 * @property string  description
 */
class Role extends Model
{
    use HasUuidTrait;

    protected $hidden = ['id'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function users(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
    {
        return $this->belongsToMany(User::class);
    }


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function permissions(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
    {
        return $this->belongsToMany(Permission::class);
    }


    /**
     * @param integer|Permission $permission
     */
    public function attachPermission($permission)
    {
        $this->permissions()->attach($permission);
    }

    /**
     * @param array $permissions Array of Permission objects or id.
     */
    public function attachPermissions(array $permissions)
    {
        foreach ($permissions as $permission) {
            $this->attachPermission($permission);
        }
    }

    /**
     * @param integer|Permission $permission
     */
    public function detachPermission($permission)
    {
        $this->permissions()->detach($permission);
    }

    /**
     * @param array $permissions Array of Permission objects or id.
     */
    public function detachPermissions(array $permissions)
    {
        foreach ($permissions as $permission) {
            $this->detachPermission($permission);
        }
    }

    /**
     * @return array
     */
    public function permissionsArray(): array
    {
        return $this->permissions()->get()->toArray();
    }
    /**
     * Permissions
     *
     * @param string $action
     *
     * @return boolean
     */
    public function hasPermission(string $action): bool
    {
        return $this->permissions()->where('action', $action)->exists();
    }
    /**
     * @return string
     */
    public function getRouteKeyName(): string
    {
        return 'uuid';
    }
}
