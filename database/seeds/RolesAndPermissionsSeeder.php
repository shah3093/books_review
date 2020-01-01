<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Config;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolesAndPermissionsSeeder extends Seeder
{
    public function run()
    {
        // Reset cached roles and permissions
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // create permissions

        Permission::create(['name' => Config::get('constants.permissions.USER_CREATE')]);
        Permission::create(['name' => Config::get('constants.permissions.USER_DELETE')]);
        Permission::create(['name' => Config::get('constants.permissions.USER_EDIT')]);
        Permission::create(['name' => Config::get('constants.permissions.USER_LIST')]);

        Permission::create(['name' => Config::get('constants.permissions.PERMISSION_LIST')]);
        Permission::create(['name' => Config::get('constants.permissions.ASSIGN_PERMISSION')]);


        // create roles and assign created permissions

        // this can be done as separate statements
        $role = Role::create(['name' => Config::get('constants.roles.USER')]);
        // or may be done by chaining
        $role = Role::create(['name' => Config::get('constants.roles.MODERATOR')]);
        $role = Role::create(['name' => Config::get('constants.roles.SUPER_ADMIN')]);
        $role->givePermissionTo(Permission::all());

        $user = \App\Models\User::find(1);
        $user->assignRole(Config::get('constants.roles.SUPER_ADMIN'));
    }
}
