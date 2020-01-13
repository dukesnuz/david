<?php
/*********************************
* these routes are for blog
**********************************/

Auth::routes();

Route::get('blog/home', 'BlogController@index');

Route::get('/blog/show-blog-posts', function () {
    return view('blog.show-posts')->with([
   'title' => 'Website Development & Technology Latest Blog Posts | Dukesnuz',
   'description' => 'A blog about website development and technology at Dukesnuz.
    Coding tutorials and technolgy topics are the main subjects',
   'keywords' => 'website development, computer technology',
 ]);
});

Route::get('/blog/search', function () {
    return view('blog.search')->with([
   'title' => 'Search Website Development & Technology Blog | Dukesnuz',
   'description' => 'A blog about website development and technology at Dukesnuz.
    Coding tutorials and technolgy topics are the main subjects',
   'keywords' => 'website development, computer technology',
 ]);
});

// Routes for logged in users
Route::group(['middleware' => 'auth'], function () {
    Route::get('/blog/show-all-blog-posts', function () {
        return view('blog.show-posts')->with([
          'title' => 'Website Development & Technology Blog | Dukesnuz',
          'description' => 'A blog about website development and technology at Dukesnuz.
           Coding tutorials and technolgy topics are the main subjects',
          'keywords' => 'website development, computer technology',
       ]);
    });

    Route::get('/blog/create', function () {
        return view('blog.create-post')->with([
      'title' => 'Create Blog Post',
      'description' => 'Website development and technology blog posts. ',
      'keywords' => 'website developemnt, technology',
       ]);
    });

    Route::get('/blog/blog-post/{id}/edit', 'BlogController@edit');
});

// keep this route at bottom, throws error when other routes after it.
Route::get('/blog/{id}/{cat?}/{slug?}/', 'BlogController@blogPost');
