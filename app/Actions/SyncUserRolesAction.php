<?php

namespace App\Actions;

use App\Models\Permission;
use App\Models\Role;

class SyncUserRolesAction
{
    protected static $PERMISSIONS_PATH = '/common/user-roles.json';

    public static function execute()
    {
        $json = file_get_contents(base_path(static::$PERMISSIONS_PATH));

        $roles = json_decode($json, true);

        foreach ($roles as $role => $permissions) {
            static::syncPermissions(
                $permissions,
                Role::query()->createOrFirst(['name' => $role])
            );
        }
    }

    public static function syncPermissions(array $permissions, Role $toRole)
    {
        foreach ($permissions as $permission) {
            Permission::query()
                    ->createOrFirst(['name' => $permission])
                    ->assignRole($toRole);
        }
    }
}
