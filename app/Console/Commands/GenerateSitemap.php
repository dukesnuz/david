<?php

namespace David\Console\Commands;

use Illuminate\Console\Command;
use Spatie\Sitemap\SitemapGenerator;
use Mail;

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
        SitemapGenerator::create("http://blog.dukesnuz.com/blog/home")->writeToFile('public/sitemap.xml');
        SitemapGenerator::create("https://david.dukesnuz.com/blog/home")->writeToFile('public/sitemap_david.xml');
        SitemapGenerator::create("http://dukesnuz.com")->writeToFile('public/sitemap_main.xml');
        $this->emailNotification();
    }

    public function emailNotification()
    {
        $body = "sitemap.xml file was updated used cron and GenerateSitemap pacakge.\r\n";
        $body .=  date('M-d-Y H:i:s');
        $data = array(
      'email' => config('constants.email_dukesnuz'),
      'emailFrom' => config('constants.email_dukesnuz'),
      'subject' => "Cron Ran, Sitemap.xml Was updated",
      'body' => $body,
    );
        Mail::raw($data['body'], function ($message) use ($data) {
            $message->to($data['email']);
            $message->from($data['emailFrom']);
            $message->subject($data['subject']);
        });
    }
}
