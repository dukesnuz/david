<?php

namespace David\Console\Commands;

use Illuminate\Console\Command;
use Spatie\Sitemap\SitemapGenerator;

class GenerateSitemap extends Command
{
    /**
    * The console command name.
    *
    * @var string
    */
    protected $signature = 'sitemap:generate';

    /**
    * The console command description.
    *
    * @var string
    */
    protected $description = 'Generate the sitemap.';

    /**
    * Execute the console command.
    *
    * @return mixed
    */
    public function handle()
    {
        // modify this to your own needs
        SitemapGenerator::create("http://".config('constants.base_url').'/blog/home')
        ->writeToFile(public_path('sitemap.xml'));
        SitemapGenerator::create("http://dukesnuz.com")
        ->writeToFile(public_path('sitemap_main.xml'));
    }
}
