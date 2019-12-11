<?php
/*********************************
* these routes are for blog
**********************************/
Auth::routes();

Route::get('blog/home', 'BlogController@index');

Route::get('/blog/show-blog-posts', function () {
    return view('blog.show-posts');
});

// Routes for logged in users

Route::group(['middleware' => 'auth'], function () {
    Route::get('/blog/create', function () {
        return view('blog.create-post');
    });
    Route::get('/blog/blog-post/{id}/edit', 'BlogController@edit');
});

// keep thos route at bottom, throws error when other routes after it.
Route::get('/blog/{id}/{slug?}', 'BlogController@blogPost');
