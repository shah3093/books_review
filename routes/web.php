<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use Illuminate\Support\Facades\Config;

Route::auth();

Route::group(['middleware' => ['auth']], function () {
    Route::get('/', function () {
       return view('admin.home.index');
    });
    Route::get('/permission','Admin\PermissionController@index')->name('permission')
        ->middleware('permission:'.Config::get('constants.permissions.PERMISSION_LIST'));
    Route::get('/permission-assign/{role}','Admin\PermissionController@assignPermission')->name('permission.assign')
        ->middleware('permission:'.Config::get('constants.permissions.ASSIGN_PERMISSION'));
    Route::post('/permission-assign/store','Admin\PermissionController@store')->name('permission.store')
        ->middleware('permission:'.Config::get('constants.permissions.STORE_PERMISSION'));
});

