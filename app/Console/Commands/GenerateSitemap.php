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
        //"http://".config('constants.base_url').'/blog/home'
        SitemapGenerator::create("http://blog.dukesnuz.com/blog/home")->writeToFile('sitemap.xml');
        SitemapGenerator::create("https://david.dukesnuz.com/blog/home")->writeToFile('sitemap_david.xml');
        SitemapGenerator::create("http://dukesnuz.com")->writeToFile('sitemap_main.xml');
    }
}
