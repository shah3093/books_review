<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Config;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class PermissionsSeeder extends Seeder
{
    public function run()
    {
//        Permission::create(['name' => Config::get('constants.permissions.STORE_PERMISSION')]);


//        Permission::create(['name' => Config::get('constants.permissions.USER_STORE')]);
//        Permission::create(['name' => Config::get('constants.permissions.USER_UPDATE')]);

//        Permission::create(['name' => Config::get('constants.permissions.AUTHOR_CREATE')]);
//        Permission::create(['name' => Config::get('constants.permissions.AUTHOR_STORE')]);
//        Permission::create(['name' => Config::get('constants.permissions.AUTHOR_DELETE')]);
//        Permission::create(['name' => Config::get('constants.permissions.AUTHOR_EDIT')]);
//        Permission::create(['name' => Config::get('constants.permissions.AUTHOR_UPDATE')]);
//        Permission::create(['name' => Config::get('constants.permissions.AUTHOR_LIST')]);
//

        // Permission::create(['name' => Config::get('constants.permissions.PUBLISHER_CREATE')]);
        // Permission::create(['name' => Config::get('constants.permissions.PUBLISHER_STORE')]);
        // Permission::create(['name' => Config::get('constants.permissions.PUBLISHER_DELETE')]);
        // Permission::create(['name' => Config::get('constants.permissions.PUBLISHER_EDIT')]);
        // Permission::create(['name' => Config::get('constants.permissions.PUBLISHER_UPDATE')]);
        // Permission::create(['name' => Config::get('constants.permissions.PUBLISHER_LIST')]);

        Permission::create(['name' => Config::get('constants.permissions.BOOK_CREATE')]);
        Permission::create(['name' => Config::get('constants.permissions.BOOK_STORE')]);
        Permission::create(['name' => Config::get('constants.permissions.BOOK_DELETE')]);
        Permission::create(['name' => Config::get('constants.permissions.BOOK_EDIT')]);
        Permission::create(['name' => Config::get('constants.permissions.BOOK_UPDATE')]);
        Permission::create(['name' => Config::get('constants.permissions.BOOK_LIST')]);



    }
}
