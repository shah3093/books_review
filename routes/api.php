<?php

use App\Http\Middleware\CheckApiResponseType;
use Illuminate\Http\Request;

header('Access-Control-Allow-Origin: *');
//Access-Control-Allow-Origin: *
header('Access-Control-Allow-Methods:  POST, GET, OPTIONS, PUT, DELETE');
header('Access-Control-Allow-Headers:  Content-Type, X-Auth-Token, Origin, Authorization');

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

Route::group(['middleware' => ['check_api_response']], function () {
    Route::prefix('v1')->namespace('Api\v1')->group(function () {
        Route::get('books/most-reviewd-books/{limit?}', 'BookController@getMostReviewdBooks')->name('most-reviewd-books');
        Route::get('books', 'BookController@getBooks')->name('books');
        Route::get('books/{id}', 'BookController@show')->name('book.show');
        Route::get('books/subjects/{limit}', 'BookController@getSubjectWiseBooks')->name('book.subject');


        Route::get('authors', 'AuthorController@getAuthors')->name('authors');
        Route::get('publishers', 'PublisherController@getPublisher')->name('publishers');
        Route::get('subjects', 'SubjectController@getSubject')->name('subjects');

        Route::get('reviews/book/{id}', 'ReviewController@getReviewsByBookId')->name('reviews');
        Route::get('reviews/{id}', 'ReviewController@show')->name('review.show');
    });
});



Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
