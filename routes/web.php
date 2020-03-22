<?php
use Spatie\Sitemap\SitemapGenerator;

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

//manually run sitemap using callback function
Route::get('sitemap', function () {
  ini_set('max_execution_time', 3600); //60 minutes
  ini_set('memory_limit', -1);
  //SitemapGenerator::create("http://".config('constants.base_url').'/blog/home')->writeToFile('sitemap.xml');
  SitemapGenerator::create("http://blog.dukesnuz.com/blog/home")->writeToFile('public/sitemap.xml');
  SitemapGenerator::create("https://david.dukesnuz.com/blog/home")->writeToFile('public/sitemap_david.xml');
  SitemapGenerator::create("http://dukesnuz.com")->writeToFile('public/sitemap_main.xml');
  return "sitemap created";
});

Route::get('/', function () {
  return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

// add email subscribe
Route::post('/email-subscribe', 'BlogController@emailSubscribe');

// links section
Route::get('/links/get-list', 'UrlController@url');

// Get links by category
Route::get('links/category/{category}', 'UrlController@category');

// Get links by tag
Route::get('links/tag/{tag}', 'UrlController@tag');

// Get one links
Route::get('links/subject/{id}/{subject}', 'UrlController@link');

// Get search blade
Route::get('links/search', 'UrlController@search');

// Get about blade
Route::get('about', function () {
  return view('utilities.about')->with([
    'title' => 'About | Dukesnuz',
    'description' => "A blog about website development and technology.
    Also, Duke's favorite website links with an emphayis on website development and technology.",
    'keywords' => 'website development, computer technology',
  ]);
});

// Get use blade
Route::get('uses', function () {
  return view('utilities.use')->with([
    'title' => '/uses | Dukesnuz',
    'description' => "Tools I use to develop, code and build webpages and websites. I heard about this
    idea, to make a Uses page, from Syntax.fm podcast. A podcast by Wes Bos and Scott Tilinski.",
    'keywords' => 'website development, builder',
    'author' => 'David Petringa, Page originally coded January 21, 2020'
  ]);
});

// Routes for logged in users
Route::group(['middleware' => 'auth'], function () {
  Route::get('/links/create', 'UrlController@create');

  Route::post('links/url', 'UrlController@store');

  Route::get('links/create-categories', 'UrlController@createCategories');

  Route::post('links/category', 'UrlController@storeCategory');

  Route::get('links/create-tags', 'UrlController@createTags');

  Route::post('links/tag', 'UrlController@storeTag');

  # Show form to edit url
  Route::get('/links/edit/{id}', 'UrlController@editUrl');
  # Process form to update url
  Route::post('/links/update-url/{id}', 'UrlController@updateUrl');

  // for file upload
  Route::get('/file/home-file', 'FileController@index')->name('home-file');
  Route::post('/file/upload', 'FileController@postUpload')->name('upload-file');
});

// view uploaded files
Route::get('/file/images',  'FileController@getFiles')->name('images-show');
Route::get('/image/show/{id}', 'FileController@getAFile')->name('image-show');

//added route files to app/Providers/RouteServiceProvider.php
// blog routes added here
Auth::routes();

//Fallback/Catchall Route
Route::fallback(function () {
  return view('errors.layout');
});
