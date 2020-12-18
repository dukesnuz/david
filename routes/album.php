<?php
/****************************
* These routes are for the photo album
*********************/



Route::get('/photoalbum', 'AlbumController@index');

//return blade to upload photo
Route::get('/photoalbum/create', 'AlbumController@create');

//post form to upload photo
Route::post('/photoalbum/store', 'AlbumController@store')->name('upload-picture');


Auth::routes();
