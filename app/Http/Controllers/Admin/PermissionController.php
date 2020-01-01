<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Utils\CommonFunction;
use Illuminate\Foundation\Auth\ConfirmsPasswords;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Spatie\Permission\Models\Role;

class PermissionController extends Controller
{
    public function index(){
        return view('admin.permission.index');
    }

    public function assignPermission($role){
//        $data['role'] = $role;
        $role = $data['role'] = Role::findByName($role);

        if(!empty($role)){
            return view('admin.permission.edit',$data);
        }else{
            CommonFunction::flash('Role not found','danger');
            return redirect()->back();
        }
    }
    public function store(Request $request){
        $role = Role::findByName($request->input('role'));;

        if(!empty($role)){
            //removing role permissions
            $role->syncPermissions([]);

            //assinging permissions
            $permissions = $request->input('permissions');
            if(!empty($permissions)){
                foreach ($permissions as $permission){
                    $role->givePermissionTo($permission);
                }
            }

            ///clearing permission cache
            app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

            CommonFunction::flash('Permissions succefully assigned','success');
            return redirect()->route('permission');
        }else{
            CommonFunction::flash('Role not found','danger');
            return redirect()->back();
        }
    }
}
