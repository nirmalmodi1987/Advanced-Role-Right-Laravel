<?php

namespace Nirmal\RoleRight;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Blade;

use Nirmal\RoleRight\Commands\InstallCommand;

class AdvancedRoleRightServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        // Merge configuration
        $this->mergeConfigFrom(
            __DIR__ . '/../config/role-right.php', 'role-right'
        );
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // Load migrations
        $this->loadMigrationsFrom(__DIR__ . '/../database/migrations');

        // Load views
        $this->loadViewsFrom(__DIR__ . '/../resources/views', 'role-right');

        // Load routes
        $this->loadRoutesFrom(__DIR__ . '/../routes/web.php');

        // Register commands
        if ($this->app->runningInConsole()) {
            $this->commands([
                InstallCommand::class,
            ]);

            $this->publishes([
                __DIR__ . '/../config/role-right.php' => config_path('role-right.php'),
            ], 'role-right-config');

            $this->publishes([
                __DIR__ . '/../resources/views' => resource_path('views/vendor/role-right'),
            ], 'role-right-views');
        }

        // Register Blade Directives
        $this->registerBladeDirectives();
    }

    /**
     * Register Blade directives for roles and permissions.
     */
    protected function registerBladeDirectives(): void
    {
        // @role('admin') ... @endrole
        Blade::if('role', function ($role) {
            return auth()->check() && auth()->user()->hasRole($role);
        });

        // @permission('edit-post') ... @endpermission
        Blade::if('permission', function ($permission) {
            return auth()->check() && auth()->user()->hasPermissionTo($permission);
        });
    }
}
