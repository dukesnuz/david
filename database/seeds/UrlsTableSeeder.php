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
      'tag_id' => 5,
    ]);

        DB::table('urls')->insert([
      'created_at' => Carbon\Carbon::now()->toDateTimeString(),
      'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
      'subject' => 'Shalamar - Dancing In The Sheets (Live On The Dance Show)',
      'link' => 'https://www.youtube.com/watch?v=HTLDFFpol28',
      'description' => "Shalamar - Dancing In The Sheets Live On The Dance Show. ",
      'category_id' => 2,
      'tag_id' => 9,
    ]);

        DB::table('urls')->insert([
      'created_at' => Carbon\Carbon::now()->toDateTimeString(),
      'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
      'subject' => 'Paletton Colors',
      'link' => 'http://paletton.com',
      'description' => "Paleton's color colorpedia",
      'category_id' => 3,
      'tag_id' => 7,
    ]);
    }
}
