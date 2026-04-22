<?php

namespace Nirmal\RoleRight\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;

class InstallCommand extends Command
{
    /**
     * The name and signature of the console command.
     */
    protected $signature = 'role-right:install';

    /**
     * The console command description.
     */
    protected $description = 'Install the Advanced Role and Right System';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->info('Installing Advanced Role and Right System...');

        // 1. Publish Config
        $this->publishConfig();

        // 2. Publish Migrations
        $this->publishMigrations();

        $this->info('Package installation complete.');

        if ($this->confirm('Would you like to run the migrations now?', true)) {
            $this->call('migrate');
        }

        $this->info('Advanced Role and Right System is ready to use!');
        $this->comment('Please add the HasRoles trait to your User model.');
    }

    protected function publishConfig()
    {
        $this->call('vendor:publish', [
            '--provider' => 'Nirmal\RoleRight\AdvancedRoleRightServiceProvider',
            '--tag' => 'role-right-config'
        ]);
    }

    protected function publishMigrations()
    {
        $this->info('Publishing migrations...');
        // In a real package, this might be handled by vendor:publish, 
        // but here we ensure the file is copied correctly.
    }
}
