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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

// links section
Route::get('/links/get-list', 'UrlController@url');
// Routes for logged in users
Route::group(['middleware' => 'auth'], function () {
    Route::get('/links/create', 'UrlController@create');

    Route::post('links/url', 'UrlController@store');

    Route::get('links/create-categories', 'UrlController@createCategories');

    Route::post('links/category', 'UrlController@storeCategory');

    Route::get('links/create-tags', 'UrlController@createTags');

    Route::post('links/tag', 'UrlController@storeTag');

    # Show form to edit url
    Route::get('/links/edit/{id}', 'UrlController@editUrl');
    # Process form to update url
    Route::post('/links/update-url/{id}', 'UrlController@updateUrl');
});
