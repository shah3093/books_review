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

    Route::get('users','Admin\UserController@index')->name('user')
        ->middleware('permission:'.Config::get('constants.permissions.USER_LIST'));
    Route::get('users-create','Admin\UserController@create')->name('user.create')
        ->middleware('permission:'.Config::get('constants.permissions.USER_CREATE'));
    Route::post('users-store','Admin\UserController@store')->name('user.store')
        ->middleware('permission:'.Config::get('constants.permissions.USER_STORE'));
    Route::get('users-edit/{id}','Admin\UserController@edit')->name('user.edit')
        ->middleware('permission:'.Config::get('constants.permissions.USER_EDIT'));
    Route::post('users-update/{id}','Admin\UserController@update')->name('user.update')
        ->middleware('permission:'.Config::get('constants.permissions.USER_UPDATE'));
    Route::get('users-delete/{id}','Admin\UserController@destroy')->name('user.delete')
        ->middleware('permission:'.Config::get('constants.permissions.USER_DELETE'));
});

