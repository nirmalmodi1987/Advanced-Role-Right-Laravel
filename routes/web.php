<?php

use Illuminate\Support\Facades\Route;
use Nirmal\RoleRight\Http\Controllers\DashboardController;
use Nirmal\RoleRight\Http\Controllers\RoleController;
use Nirmal\RoleRight\Http\Controllers\PermissionController;
use Nirmal\RoleRight\Http\Controllers\AuditController;

Route::prefix('role-right')->middleware(['web', 'auth'])->name('role-right.')->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
    
    // Roles Management
    Route::resource('roles', RoleController::class);
    Route::get('roles/{role}/permissions', [RoleController::class, 'editPermissions'])->name('roles.permissions.edit');
    Route::put('roles/{role}/permissions', [RoleController::class, 'updatePermissions'])->name('roles.permissions.update');

    // Permissions Management
    Route::resource('permissions', PermissionController::class);

    // Audit Logs
    Route::get('audit-logs', [AuditController::class, 'index'])->name('audit-logs.index');
});
