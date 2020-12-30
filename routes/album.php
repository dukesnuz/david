<?php
/****************************
* These routes are for the photo album
*********************/
Auth::routes();

// Routes for logged in users
Route::group(['middleware' => 'auth'], function () {

Route::get('/photoalbum', 'AlbumController@index');

//return blade to upload photo
Route::get('/photoalbum/create', 'AlbumController@create');

//return blade to edit photo
Route::get('/photoalbum/edit/{id}', 'AlbumController@edit');

//post form to upload photo
Route::post('/photoalbum/store', 'AlbumController@store')->name('upload-picture');

//edit picture data
Route::post('/photoalbum/update', 'AlbumController@update')->name('update-picture');

//return blade to display one photo
Route::get('/photoalbum/photo/{id}/cat/slug', 'AlbumController@show');


});
