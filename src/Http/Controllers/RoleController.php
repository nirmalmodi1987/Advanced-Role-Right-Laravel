<?php

namespace Nirmal\RoleRight\Http\Controllers;

use Illuminate\Routing\Controller;
use Illuminate\Http\Request;
use Nirmal\RoleRight\Models\Role;
use Nirmal\RoleRight\Models\Permission;
use Nirmal\RoleRight\Models\AuditLog;
use Illuminate\Support\Str;

class RoleController extends Controller
{
    /**
     * Display a listing of the roles.
     */
    public function index()
    {
        $roles = Role::withCount('users', 'permissions')->get();
        return view('role-right::roles.index', compact('roles'));
    }

    /**
     * Show the form for creating a new role.
     */
    public function create()
    {
        return view('role-right::roles.create');
    }

    /**
     * Store a newly created role in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:' . config('role-right.table_names.roles'),
            'description' => 'nullable|string|max:500',
        ]);

        $role = Role::create([
            'name' => $request->name,
            'slug' => Str::slug($request->name),
            'description' => $request->description,
        ]);

        AuditLog::log('role_created', 'Role', $role->id, ['name' => $role->name]);

        return redirect()->route('role-right.roles.index')->with('success', 'Role created successfully!');
    }

    /**
     * Remove the specified role from storage.
     */
    public function destroy(Role $role)
    {
        $roleId = $role->id;
        $roleName = $role->name;
        $role->delete();

        AuditLog::log('role_deleted', 'Role', $roleId, ['name' => $roleName]);

        return redirect()->route('role-right.roles.index')->with('success', 'Role deleted successfully!');
    }

    /**
     * Show the form for editing permissions for a role.
     */
    public function editPermissions(Role $role)
    {
        $permissions = Permission::all()->groupBy('group');
        $rolePermissions = $role->permissions->pluck('id')->toArray();
        
        return view('role-right::roles.permissions', compact('role', 'permissions', 'rolePermissions'));
    }

    /**
     * Update the permissions for a role.
     */
    public function updatePermissions(Request $request, Role $role)
    {
        $role->permissions()->sync($request->permissions ?? []);
        
        AuditLog::log('permissions_mapped', 'Role', $role->id, [
            'role' => $role->name,
            'permission_count' => count($request->permissions ?? [])
        ]);

        return redirect()->route('role-right.roles.index')->with('success', 'Permissions updated for ' . $role->name);
    }
}
