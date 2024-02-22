<?php

namespace App\Console\Commands;

use App\Models\Permission;
use App\Models\Role;
use Illuminate\Console\Command;

class SetupUserRolesCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:setup-roles';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $role = Role::create(['name' => Role::ADMIN]);
        $permission = Permission::create(['name' => Permission::ACCESS_ADMIN_PANEL]);

        $role->givePermissionTo($permission);
    }
}
