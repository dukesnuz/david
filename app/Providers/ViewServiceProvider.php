<?php

namespace David\Providers;

use Illuminate\Support\ServiceProvider;
use View;

class ViewServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        view::share('title', 'Dukesnuz A Website Development and Technology Blog');
        view()->share('description', 'Website development and web design blog with some
        computer technology posts. There is a section with a collection of my favorite web sites.');
        view()->share('keywords', 'blog, website developmemnt, web design');
        view()->share('author', 'David Petringa, Coded December 2019');
    }
}
