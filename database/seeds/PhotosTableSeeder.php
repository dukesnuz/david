<?php

use Illuminate\Database\Seeder;

class PhotosTableSeeder extends Seeder
{
  /**
  * Run the database seeds.
  *
  * @return void
  */
  public function run()
  {
    DB::table('photos')->insert([
      'created_at' => Carbon\Carbon::now()->toDateTimeString(),
      'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
      'title' => 'title 1',
      'caption' => 'caption 1',
      'path' => 'path 1',
      'category_id' => 1,
      'size' => 1,
      'meta_description' => 'meta description 1',
      'url_friendly' => 'url friendly 1',
      'is_live' => 1,
      'auth_by' => 1,
      'ip' => '111.56.789',
    ]);

    DB::table('photos')->insert([
      'created_at' => Carbon\Carbon::now()->toDateTimeString(),
      'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
      'title' => 'title 2',
      'caption' => 'caption 2',
      'path' => 'path 2',
      'category_id' => 2,
      'size' => 2,
      'meta_description' => 'meta description 2',
      'url_friendly' => 'url friendly 1',
      'is_live' => 2,
      'auth_by' => 2,
      'ip' => '222.56.789',
    ]);

    DB::table('photos')->insert([
      'created_at' => Carbon\Carbon::now()->toDateTimeString(),
      'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
      'title' => 'title 3',
      'caption' => 'caption 3',
      'path' => 'path ',
      'category_id' => 3,
      'size' => 3,
      'meta_description' => 'meta description 3',
      'url_friendly' => 'url friendly 3',
      'is_live' => 3,
      'auth_by' => 3,
      'ip' => '333.56.789',
    ]);
  }
}
