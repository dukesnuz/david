<?php
/*********************************
* these routes are for blog
**********************************/

Route::get('blog/home', 'BlogController@index');

Route::get('/blog/create', function () {
    return view('blog.create-post');
});

Route::get('/blog/show-blog-posts', function () {
    return view('blog.show-posts');
});

Route::get('/blog/{id}/{slug?}', 'BlogController@blogPost');
