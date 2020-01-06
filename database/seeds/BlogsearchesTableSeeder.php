<?php

use Illuminate\Database\Seeder;

class BlogsearchesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('searches')->insert([
    'created_at' => Carbon\Carbon::now()->toDateTimeString(),
    'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
    'term' => 'laravel',
    'user_id' => '1',
    'ip' => '77.555.22.99'
  ]);

        DB::table('searches')->insert([
    'created_at' => Carbon\Carbon::now()->toDateTimeString(),
    'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
    'term' => 'laravel',
    'user_id' => '0',
    'ip' => '66.444.22.99'
  ]);

        DB::table('searches')->insert([
    'created_at' => Carbon\Carbon::now()->toDateTimeString(),
    'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
    'term' => 'git',
    'user_id' => '0',
    'ip' => '55.666.11.99'
  ]);
    }
}
