<?php

use Illuminate\Database\Seeder;

class UrlsTableSeeder extends Seeder
{
    /**
    * Run the database seeds.
    *
    * @return void
    */
    public function run()
    {
        DB::table('urls')->insert([
      'created_at' => Carbon\Carbon::now()->toDateTimeString(),
      'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
      'subject' => 'Laravel',
      'link' => 'http://www.laravel.com',
      'description' => "Laravel.com",
    ]);

        DB::table('urls')->insert([
      'created_at' => Carbon\Carbon::now()->toDateTimeString(),
      'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
      'subject' => 'Version Control',
      'link' => 'https://en.wikipedia.org/wiki/Version_control',
      'description' => "What is version control",
    ]);

        DB::table('urls')->insert([
      'created_at' => Carbon\Carbon::now()->toDateTimeString(),
      'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
      'subject' => 'Pro Git Book',
      'link' => 'https://git-scm.com/book/en/v2',
      'description' => "The entire Pro Git book, written by Scott Chacon and Ben Straub ",
    ]);
    }
}
