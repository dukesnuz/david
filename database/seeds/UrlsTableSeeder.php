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
      'category_id' => 1,
    ]);

        DB::table('urls')->insert([
      'created_at' => Carbon\Carbon::now()->toDateTimeString(),
      'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
      'subject' => 'Git',
      'link' => 'https://en.wikipedia.org/wiki/Version_control',
      'description' => "What is version control",
      'category_id' => 3,
    ]);

        DB::table('urls')->insert([
      'created_at' => Carbon\Carbon::now()->toDateTimeString(),
      'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
      'subject' => 'PHP',
      'link' => 'https://git-scm.com/book/en/v2',
      'description' => "The entire Pro Git book, written by Scott Chacon and Ben Straub ",
      'category_id' => 3.
    ]);
    }
}
