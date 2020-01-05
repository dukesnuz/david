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
        view()->share('description', 'Website development and technology blog. Also with a collection of
        favorite web sites at Dukesnuz. There is a large concentration on web dev.');
        view()->share('keywords', 'blog, website developmemnt');
        view()->share('author', 'David Petringa, Coded December 2019');
    }
}
