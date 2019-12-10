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
      'description' => "Laravel web application framework",
      'category_id' => 1,
    ]);

        DB::table('urls')->insert([
      'created_at' => Carbon\Carbon::now()->toDateTimeString(),
      'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
      'subject' => 'Shalamar - Dancing In The Sheets (Live On The Dance Show)',
      'link' => 'https://vuejs.org/',
      'description' => "Vue.js frontend framework.",
      'category_id' => 2,
    ]);

        DB::table('urls')->insert([
      'created_at' => Carbon\Carbon::now()->toDateTimeString(),
      'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
      'subject' => 'Paletton Colors',
      'link' => 'http://paletton.com',
      'description' => "Paleton's color colorpedia",
      'category_id' => 3,
    ]);
    }
}
