<?php

namespace David\Providers;

use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;

class RouteServiceProvider extends ServiceProvider
{
  /**
  * This namespace is applied to your controller routes.
  *
  * In addition, it is set as the URL generator's root namespace.
  *
  * @var string
  */
  protected $namespace = 'David\Http\Controllers';

  /**
  * Define your route model bindings, pattern filters, etc.
  *
  * @return void
  */
  public function boot()
  {
    //

    parent::boot();
  }

  /**
  * Define the routes for the application.
  *
  * @return void
  */
  public function map()
  {
    $this->mapApiRoutes();

    $this->mapWebRoutes();

    $this->mapBlogWebRoutes(); //for blog routes

    $this->mapAlbumWebRoutes(); //for album routes

    //
  }

  /**
  * Define the "web" routes for the application.
  *
  * These routes all receive session state, CSRF protection, etc.
  *
  * @return void
  */
  protected function mapWebRoutes()
  {
    Route::middleware('web')
    ->namespace($this->namespace)
    ->group(base_path('routes/web.php'));
  }

  /********************************************
  * using below method
  * https://medium.com/@thesourav/organize-your-laravel-routes-for-better-and-maintainable-code-4ad9b76aed0f
  *********BEGIN new code*************************/
  protected function mapBlogWebRoutes()
  {
    Route::middleware('web')
    ->namespace($this->namespace)
    //  ->prefix('admin')
    ->group(base_path('routes/blog.php'));
  }

  /********************************************
  * using below method
  * https://medium.com/@thesourav/organize-your-laravel-routes-for-better-and-maintainable-code-4ad9b76aed0f
  *********BEGIN new code*************************/
  protected function mapAlbumWebRoutes()
  {
    Route::middleware('web')
    ->namespace($this->namespace)
    ->group(base_path('routes/album.php'));
  }

  /**
  * Define the "api" routes for the application.
  *
  * These routes are typically stateless.
  *
  * @return void
  */
  protected function mapApiRoutes()
  {
    Route::prefix('api')
    ->middleware('api')
    ->namespace($this->namespace)
    ->group(base_path('routes/api.php'));
  }
}
