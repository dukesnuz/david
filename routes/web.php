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

// Get links by category
Route::get('links/category/{category}', 'UrlController@category');

// Get links by tag
Route::get('links/tag/{tag}', 'UrlController@tag');

// Get one links
Route::get('links/subject/{id}/{subject}', 'UrlController@link');

// Get search blade
Route::get('links/search', 'UrlController@search');

// Get search blade
Route::get('links/about', function () {
    return view('links.about');
});


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


//added route files to app/Providers/RouteServiceProvider.php
Auth::routes();
