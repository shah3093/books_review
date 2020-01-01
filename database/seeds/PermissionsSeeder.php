<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Config;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class PermissionsSeeder extends Seeder
{
    public function run()
    {
        Permission::create(['name' => Config::get('constants.permissions.STORE_PERMISSION')]);
    }
}
