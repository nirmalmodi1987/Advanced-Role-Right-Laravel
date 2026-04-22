<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Models
    |--------------------------------------------------------------------------
    |
    | Define the models used for roles and permissions. 
    | You can extend the package models to add your own logic.
    |
    */
    'models' => [
        'role' => \Nirmal\RoleRight\Models\Role::class,
        'permission' => \Nirmal\RoleRight\Models\Permission::class,
    ],

    /*
    |--------------------------------------------------------------------------
    | Table Names
    |--------------------------------------------------------------------------
    |
    | Customize the table names used by the package.
    |
    */
    'table_names' => [
        'roles' => 'roles',
        'permissions' => 'permissions',
        'role_user' => 'role_user',
        'permission_role' => 'permission_role',
        'permission_user' => 'permission_user', // For direct user permissions
        'audit_logs' => 'role_permission_audit_logs',
    ],

    /*
    |--------------------------------------------------------------------------
    | Caching
    |--------------------------------------------------------------------------
    |
    | Set the cache expiration time for roles and permissions.
    |
    */
    'cache' => [
        'expiration_time' => \DateInterval::createFromDateString('24 hours'),
        'key' => 'nirmal.role-right.cache',
    ],
];
