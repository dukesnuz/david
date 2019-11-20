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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('search/{term}', 'UrlController@show');

// return last x number of searches
Route::get('searches', 'UrlController@showAll');


// return last post
Route::get('get-last-blog-post', 'BlogController@getLastBlogPost');
