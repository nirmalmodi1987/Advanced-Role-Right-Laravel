<?php

namespace Nirmal\RoleRight\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Permission extends Model
{
    protected $fillable = ['name', 'slug', 'group', 'description'];

    protected static function boot()
    {
        parent::boot();
        static::creating(function ($permission) {
            if (!$permission->slug) {
                $permission->slug = Str::slug($permission->name);
            }
        });
    }

    public function roles()
    {
        return $this->belongsToMany(
            config('role-right.models.role'),
            config('role-right.table_names.permission_role')
        );
    }

    public function users()
    {
        return $this->belongsToMany(
            config('auth.providers.users.model'),
            config('role-right.table_names.permission_user')
        );
    }
}
