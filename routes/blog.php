<?php
/*********************************
* these routes are for blog
**********************************/

Auth::routes();

Route::get('blog/home', 'BlogController@index');

Route::get('/blog/show-blog-posts', function () {
    return view('blog.show-posts')->with([
   'title' => 'Show Blog Posts | Dukesnuz',
   'description' => 'A blog about website development, technology, transportation, comedy, politics,
    history and subjects I find interesting',
   'keywords' => 'website development, computer technology, comedy, politics, history',
 ]);
});

Route::get('/blog/search', function () {
    return view('blog.search')->with([
   'title' => 'Search Blog Posts | Dukesnuz',
   'description' => 'A blog about website development, technology, transportation, comedy, politics,
    history and subjects I find interesting',
   'keywords' => 'website development, computer technology, comedy, politics, history',
 ]);
});

// Routes for logged in users
Route::group(['middleware' => 'auth'], function () {
    Route::get('/blog/show-all-blog-posts', function () {
        return view('blog.show-posts')->with([
          'title' => 'Show All Blog Posts | Dukesnuz',
          'description' => 'A blog about website development, technology, comedy, politics,
           history and subjects I find interesting',
          'keywords' => 'website development, computer technology, comedy, politics, history',
       ]);
    });

    Route::get('/blog/create', function () {
        return view('blog.create-post')->with([
      'title' => 'Create Blog Post',
      'description' => 'A blog about website development, technology, comedy, politics,
       history and subjects I find interesting',
      'keywords' => 'website development, computer technology, comedy, politics, history',
       ]);
    });

    Route::get('/blog/blog-post/{id}/edit', 'BlogController@edit');
});

// keep this route at bottom, throws error when other routes after it.
Route::get('/blog/{id}/{cat?}/{slug?}/', 'BlogController@blogPost');
