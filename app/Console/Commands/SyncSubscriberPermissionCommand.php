<?php

namespace App\Console\Commands;

use App\Models\Role;
use App\Models\User;
use Illuminate\Console\Command;

class SyncSubscriberPermissionCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:sync-subscriber-permission';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Sync subscriber permissions';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $users = User::all();

        $users->each(function (User $user) {
            if (!$user->hasValidSubscription) {
                $user->removeRole(Role::SUBSCRIBER);
            } else {
                $user->assignRole(Role::SUBSCRIBER);
            }
        });
    }
}
