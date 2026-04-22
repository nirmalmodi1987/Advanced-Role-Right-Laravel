<?php

namespace Nirmal\RoleRight\Traits;

use Nirmal\RoleRight\Models\Role;
use Nirmal\RoleRight\Models\Permission;
use Illuminate\Support\Facades\Cache;

trait HasRoles
{
    /**
     * Relationship with roles.
     */
    public function roles()
    {
        return $this->belongsToMany(
            config('role-right.models.role'),
            config('role-right.table_names.role_user')
        )->withPivot('expires_at')->withTimestamps();
    }

    /**
     * Relationship with direct permissions.
     */
    public function directPermissions()
    {
        return $this->belongsToMany(
            config('role-right.models.permission'),
            config('role-right.table_names.permission_user')
        )->withTimestamps();
    }

    /**
     * Check if user has a specific role.
     */
    public function hasRole($role)
    {
        if (is_string($role)) {
            return $this->roles->contains('slug', $role);
        }

        if ($role instanceof Role) {
            return $this->roles->contains('id', $role->id);
        }

        return false;
    }

    /**
     * Assign a role to the user.
     */
    public function assignRole(...$roles)
    {
        $roles = collect($roles)
            ->flatten()
            ->map(function ($role) {
                if (is_string($role)) {
                    return Role::where('slug', $role)->first();
                }
                return $role;
            })
            ->filter()
            ->map(fn($role) => $role->id)
            ->all();

        $this->roles()->syncWithoutDetaching($roles);
        $this->forgetCachedPermissions();

        return $this;
    }

    /**
     * Check if user has a specific permission.
     */
    public function hasPermissionTo($permission)
    {
        if (is_string($permission)) {
            $permission = Permission::where('slug', $permission)->first();
        }

        if (!$permission) {
            return false;
        }

        // 1. Check direct permissions
        if ($this->directPermissions->contains('id', $permission->id)) {
            return true;
        }

        // 2. Check roles permissions
        foreach ($this->roles as $role) {
            if ($role->permissions->contains('id', $permission->id)) {
                return true;
            }
        }

        return false;
    }

    /**
     * Clear the cached permissions for this user.
     */
    public function forgetCachedPermissions()
    {
        Cache::forget(config('role-right.cache.key') . '.' . $this->id);
    }
}
