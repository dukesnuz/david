<?php

use Illuminate\Database\Seeder;

class PhotofavoritesTableSeeder extends Seeder
{
  /**
  * Run the database seeds.
  *
  * @return void
  */
  public function run()
  {
    DB::table('photofavorites')->insert([
      'created_at' => Carbon\Carbon::now()->toDateTimeString(),
      'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
      'is_live' => 1,
      'auth_by' => 1,
      'ip' => '111.56.789',
    ]);

    DB::table('photofavorites')->insert([
      'created_at' => Carbon\Carbon::now()->toDateTimeString(),
      'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
      'is_live' => 0,
      'auth_by' => 2,
      'ip' => '222.56.789',
    ]);

    DB::table('photofavorites')->insert([
      'created_at' => Carbon\Carbon::now()->toDateTimeString(),
      'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
      'is_live' => 1,
      'auth_by' => 3,
      'ip' => '333.56.789',
    ]);
  }
}
