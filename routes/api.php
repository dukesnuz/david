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

/*****
 * below are api routes for blog
 */
// return last post
Route::get('get-last-blog-post', 'BlogController@getLastBlogPost');
//create a new post
Route::post('/blog-post-create', 'BlogController@blogPostCreate');
// return all blog categories
Route::get('/get-all-blog-categories', 'BlogController@getAllBlogCategories');
// return all tag categories
Route::get('/get-all-blog-tags', 'BlogController@getAllBlogTags');
// return last x number blog posts
Route::get('/show-all-blog-posts', 'BlogController@showAllBlogPosts');
// return specific post with category and tags
Route::get('/show-post/{id}', 'BlogController@showPost');
