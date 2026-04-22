<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        $tableNames = config('role-right.table_names');

        // 1. Roles Table
        Schema::create($tableNames['roles'], function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->string('slug')->unique();
            $table->string('description')->nullable();
            $table->timestamps();
        });

        // 2. Permissions Table
        Schema::create($tableNames['permissions'], function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->string('slug')->unique();
            $table->string('group')->default('general'); // For UI grouping
            $table->string('description')->nullable();
            $table->timestamps();
        });

        // 3. role_user Pivot Table (Roles assigned to users)
        Schema::create($tableNames['role_user'], function (Blueprint $table) use ($tableNames) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->foreignId('role_id')->constrained($tableNames['roles'])->onDelete('cascade');
            $table->timestamp('expires_at')->nullable(); // Advanced: Temporary Roles
            $table->timestamps();
        });

        // 4. permission_role Pivot Table (Permissions assigned to roles)
        Schema::create($tableNames['permission_role'], function (Blueprint $table) use ($tableNames) {
            $table->id();
            $table->foreignId('role_id')->constrained($tableNames['roles'])->onDelete('cascade');
            $table->foreignId('permission_id')->constrained($tableNames['permissions'])->onDelete('cascade');
        });

        // 5. permission_user Pivot Table (Direct Permissions for users)
        Schema::create($tableNames['permission_user'], function (Blueprint $table) use ($tableNames) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->foreignId('permission_id')->constrained($tableNames['permissions'])->onDelete('cascade');
            $table->timestamps();
        });

        // 6. Audit Logs Table
        Schema::create($tableNames['audit_logs'], function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable()->constrained()->onDelete('set null'); // Who made the change
            $table->string('action'); // e.g., 'assigned_role', 'revoked_permission'
            $table->string('target_type'); // e.g., 'User', 'Role'
            $table->unsignedBigInteger('target_id');
            $table->json('changes')->nullable();
            $table->ipAddress('ip_address')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        $tableNames = config('role-right.table_names');

        Schema::dropIfExists($tableNames['audit_logs']);
        Schema::dropIfExists($tableNames['permission_user']);
        Schema::dropIfExists($tableNames['permission_role']);
        Schema::dropIfExists($tableNames['role_user']);
        Schema::dropIfExists($tableNames['permissions']);
        Schema::dropIfExists($tableNames['roles']);
    }
};
