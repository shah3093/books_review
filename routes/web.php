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


Route::get('/', function () {
    return view('welcome');
 });


Route::group(['middleware' => ['auth']], function () {
    
    Route::get('/admin', function () {
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


    Route::get('author','Admin\AuthorController@index')->name('author')
        ->middleware('permission:'.Config::get('constants.permissions.AUTHOR_LIST'));
    Route::get('author-create','Admin\AuthorController@create')->name('author.create')
        ->middleware('permission:'.Config::get('constants.permissions.AUTHOR_CREATE'));
    Route::post('author-store','Admin\AuthorController@store')->name('author.store')
        ->middleware('permission:'.Config::get('constants.permissions.AUTHOR_STORE'));
    Route::get('author-edit/{id}','Admin\AuthorController@edit')->name('author.edit')
        ->middleware('permission:'.Config::get('constants.permissions.AUTHOR_EDIT'));
    Route::post('author-update/{id}','Admin\AuthorController@update')->name('author.update')
        ->middleware('permission:'.Config::get('constants.permissions.AUTHOR_UPDATE'));
    Route::get('author-delete/{id}','Admin\AuthorController@destroy')->name('author.delete')
        ->middleware('permission:'.Config::get('constants.permissions.AUTHOR_DELETE'));

    Route::get('publisher','Admin\PublisherController@index')->name('publisher')
        ->middleware('permission:'.Config::get('constants.permissions.PUBLISHER_LIST'));
    Route::get('publisher-create','Admin\PublisherController@create')->name('publisher.create')
        ->middleware('permission:'.Config::get('constants.permissions.PUBLISHER_CREATE'));
    Route::post('publisher-store','Admin\PublisherController@store')->name('publisher.store')
        ->middleware('permission:'.Config::get('constants.permissions.PUBLISHER_STORE'));
    Route::get('publisher-edit/{id}','Admin\PublisherController@edit')->name('publisher.edit')
        ->middleware('permission:'.Config::get('constants.permissions.PUBLISHER_EDIT'));
    Route::post('publisher-update/{id}','Admin\PublisherController@update')->name('publisher.update')
        ->middleware('permission:'.Config::get('constants.permissions.PUBLISHER_UPDATE'));
    Route::get('publisher-delete/{id}','Admin\PublisherController@destroy')->name('publisher.delete')
        ->middleware('permission:'.Config::get('constants.permissions.PUBLISHER_DELETE'));

    Route::get('book','Admin\BookController@index')->name('book')
        ->middleware('permission:'.Config::get('constants.permissions.BOOK_LIST'));
    Route::get('book-create','Admin\BookController@create')->name('book.create')
        ->middleware('permission:'.Config::get('constants.permissions.BOOK_CREATE'));
    Route::post('book-store','Admin\BookController@store')->name('book.store')
        ->middleware('permission:'.Config::get('constants.permissions.BOOK_STORE'));
    Route::get('book-edit/{id}','Admin\BookController@edit')->name('book.edit')
        ->middleware('permission:'.Config::get('constants.permissions.BOOK_EDIT'));
    Route::post('book-update/{id}','Admin\BookController@update')->name('book.update')
        ->middleware('permission:'.Config::get('constants.permissions.BOOK_UPDATE'));
    Route::get('book-delete/{id}','Admin\BookController@destroy')->name('book.delete')
        ->middleware('permission:'.Config::get('constants.permissions.BOOK_DELETE'));


});

