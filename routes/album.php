<?php
/****************************
* These routes are for the photo album
*********************/


Route::get('/photoalbum', 'AlbumController@index');

//return blade to upload photo
Route::get('/photoalbum/create', 'AlbumController@create');

//return blade to edit photo
Route::get('/photoalbum/edit/{id}', 'AlbumController@edit');

//post form to upload photo
Route::post('/photoalbum/store', 'AlbumController@store')->name('upload-picture');

//edit picture data
Route::post('/photoalbum/update', 'AlbumController@update')->name('update-picture');

Auth::routes();
