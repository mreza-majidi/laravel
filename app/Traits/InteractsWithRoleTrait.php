<?php
/**
 * Created by PhpStorm.
 * User: Mehran.Mahmoudi@ZoodFood.Com
 * Date: 23.01.21
 * Time: 12:48
 */

namespace App\Traits;

use App\Constants\RoleConstants;
use App\Models\Role;
use Illuminate\Database\Eloquent\Builder;

trait InteractsWithRoleTrait
{
    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function roles(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
    {
        return $this->belongsToMany(Role::class);
    }

    /**
     * Check multiple roles
     *
     * @param array $roles
     *
     * @return boolean
     */
    public function hasAnyRole(array $roles): bool
    {
        return null !== $this->roles()->whereIn('name', $roles)->first();
    }

    /**
     * Check one role
     *
     * @param string $role
     *
     * @return boolean
     */
    public function hasRole(string $role): bool
    {
        return null !== $this->roles()->where('name', $role)->first();
    }

    /**
     * @param string $role
     *
     * @return boolean
     */
    public function hasNotRole(string $role): bool
    {
        return null === $this->roles()->where('name', $role)->first();
    }


    /**
     * Permissions
     *
     * @param string $action
     *
     * @return boolean
     */
    public function hasPermissions(string $action): bool
    {
        $foundPermissionsCount = $this->roles()->whereHas('permissions', function (Builder $builder) use ($action) {
            return $builder->where('action', $action);
        })->count()
        ;

        return $foundPermissionsCount > 0;
    }

    /**
     * @param integer|Role $role
     */
    public function attachRole($role)
    {
        $this->roles()->attach($role);
    }

    /**
     * @param integer|Role $role
     */
    public function detachRole($role)
    {
        $this->roles()->detach([$role]);
    }

    /**
     * @param array $roles
     */
    public function syncRoles(array $roles)
    {
        $this->roles()->sync($roles);
    }

    /**
     * @return boolean
     */
    public function isSuperAdmin(): bool
    {
        return $this->hasRole(RoleConstants::SUPER_ADMIN);
    }
}
