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
 Route::get('blog-search/{term}', 'BlogController@show');

 // return last x number of searches
 Route::get('blog-searches', 'BlogController@showAll');


// return last post
Route::get('get-last-blog-post', 'BlogController@getLastBlogPost');
//create a new post
Route::post('/blog-post-create', 'BlogController@blogPostCreate');
// return all blog categories
Route::get('/get-all-blog-categories', 'BlogController@getAllBlogCategories');
// return all tag categories
Route::get('/get-all-blog-tags', 'BlogController@getAllBlogTags');
// return last x number blog posts
Route::get('/show-live-blog-posts', 'BlogController@showLiveBlogPosts');
Route::get('/show-all-blog-posts', 'BlogController@showAllBlogPosts');

// return specific post with category and tags
Route::get('/show-post/{id}', 'BlogController@showPost');
// edit a blog post
Route::post('/edit-post/{id}', 'BlogController@update');
// add a new category
Route::post('/blog-category-create', 'BlogController@storeCategory');
// add a new tag
Route::post('/blog-tag-create', 'BlogController@storeTag');
// post a comment
Route::post('/blog-comment-create', 'BlogController@storeComment');
// return specific live comments
Route::get('/get-live-comments/{id}', 'BlogController@getLiveComments');
// return specific comments
Route::get('/get-comments/{id}', 'BlogController@getComments');
// change comment status live or not live
Route::post('edit-comment-status/{id}/{status}', 'BlogController@editCommentStatus');
// change post status live or not live
Route::post('edit-post-status/{id}/{status}', 'BlogController@editPostStatus');

/******************************
*Routes for photo section
**********/
//create a new post
//Route::post('/photo-store', 'AlbumController@store');


// add a new category
Route::post('/album-category-create', 'AlbumController@storeCategory');
// add a new tag
Route::post('/album-tag-create', 'AlbumController@storeTag');
