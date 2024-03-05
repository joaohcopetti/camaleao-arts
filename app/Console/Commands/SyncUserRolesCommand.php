<?php

namespace App\Console\Commands;

use App\Actions\SyncUserRolesAction;
use App\Models\Permission;
use App\Models\Role;
use Error;
use Illuminate\Console\Command;

class SyncUserRolesCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:sync-roles';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Sync the user roles';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        try {
            SyncUserRolesAction::execute();
        } catch (Error $e) {
            $this->error($e->getMessage());
        }

        $this->info('Regras de usuários sincronizadas');
    }
}
