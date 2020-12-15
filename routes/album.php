<?php
/****************************
* These routes are for the photo album
*********************/



Route::get('/photoalbum', 'AlbumController@index');



Auth::routes();
