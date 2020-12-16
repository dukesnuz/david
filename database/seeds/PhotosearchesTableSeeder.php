<?php

use Illuminate\Database\Seeder;

class PhotosearchesTableSeeder extends Seeder
{
  /**
  * Run the database seeds.
  *
  * @return void
  */
  public function run()
  {
    DB::table('photosearches')->insert([
      'created_at' => Carbon\Carbon::now()->toDateTimeString(),
      'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
      'term' => 'david',
      'user_id' => '1',
      'ip' => '11.555.22.99'
    ]);

    DB::table('photosearches')->insert([
      'created_at' => Carbon\Carbon::now()->toDateTimeString(),
      'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
      'term' => 'sal',
      'user_id' => '2',
      'ip' => '22.555.22.99'
    ]);

    DB::table('photosearches')->insert([
      'created_at' => Carbon\Carbon::now()->toDateTimeString(),
      'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
      'term' => 'stacy',
      'user_id' => '3',
      'ip' => '33.555.22.99'
    ]);
  }
}
