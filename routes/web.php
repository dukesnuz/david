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

Route::get('/get-list', 'UrlController@url');

Route::get('/create', 'UrlController@create');

Route::post('url', 'UrlController@store');


Route::get('create-categories', 'UrlController@createCategories');

Route::post('category', 'UrlController@storeCategory');

Route::get('create-tags', 'UrlController@createTags');

Route::post('tag', 'UrlController@storeTag');

//Route::get('update-url/{id}', 'UrlController@updateUrl');

# Show form to edit url
Route::get('/edit/{id}', 'UrlController@editUrl');
# Process form to update url
Route::post('/update-url/{id}', 'UrlController@updateUrl');
