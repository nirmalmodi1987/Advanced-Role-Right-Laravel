<?php

namespace Nirmal\RoleRight\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Role extends Model
{
    protected $fillable = ['name', 'slug', 'description'];

    protected static function boot()
    {
        parent::boot();
        static::creating(function ($role) {
            if (!$role->slug) {
                $role->slug = Str::slug($role->name);
            }
        });
    }

    public function permissions()
    {
        return $this->belongsToMany(
            config('role-right.models.permission'),
            config('role-right.table_names.permission_role')
        );
    }

    public function users()
    {
        return $this->belongsToMany(
            config('auth.providers.users.model'),
            config('role-right.table_names.role_user')
        );
    }
}
