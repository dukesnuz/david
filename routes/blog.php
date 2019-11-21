<?php
/*********************************
* these routes are for blog
**********************************/

Route::get('blog/home', 'BlogController@index');

Route::get('/blog/create', function () {
    return view('blog.create-post');
});
