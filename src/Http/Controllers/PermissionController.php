<?php

namespace Nirmal\RoleRight\Http\Controllers;

use Illuminate\Routing\Controller;
use Illuminate\Http\Request;
use Nirmal\RoleRight\Models\Permission;
use Illuminate\Support\Str;

class PermissionController extends Controller
{
    /**
     * Display a listing of the permissions.
     */
    public function index()
    {
        $permissions = Permission::all()->groupBy('group');
        return view('role-right::permissions.index', compact('permissions'));
    }

    /**
     * Show the form for creating a new permission.
     */
    public function create()
    {
        return view('role-right::permissions.create');
    }

    /**
     * Store a newly created permission in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'group' => 'required|string|max:100',
            'description' => 'nullable|string|max:500',
        ]);

        Permission::create([
            'name' => $request->name,
            'slug' => Str::slug($request->name),
            'group' => Str::slug($request->group),
            'description' => $request->description,
        ]);

        return redirect()->route('role-right.permissions.index')->with('success', 'Permission created successfully!');
    }

    /**
     * Remove the specified permission from storage.
     */
    public function destroy(Permission $permission)
    {
        $permission->delete();
        return redirect()->route('role-right.permissions.index')->with('success', 'Permission deleted successfully!');
    }
}
