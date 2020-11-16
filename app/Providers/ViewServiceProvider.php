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
        view::share('title', 'Dukesnuz Blog');
        view()->share('description', 'A blog about website development, technology, transportation, comedy, politics,
         history and subjects I find interesting');
        view()->share('keywords', 'website development, computer technology, transportation, comedy, politics, history');
        view()->share('author', 'David Petringa, Coded December 2019');
    }
}
