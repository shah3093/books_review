<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::prefix('v1')->namespace('Api\v1')->group(function () {
    Route::get('books/most-reviewd-books/{limit?}', 'BookController@getMostReviewdBooks')->name('most-reviewd-books');
    Route::get('books', 'BookController@getBooks')->name('books');


    Route::get('authors', 'AuthorController@getAuthors')->name('authors');
    Route::get('publishers', 'PublisherController@getPublisher')->name('publishers');
    Route::get('subjects', 'SubjectController@getSubject')->name('subjects');

});


Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
