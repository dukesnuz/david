<?php

use Illuminate\Database\Seeder;

class BlogcommentsTableSeeder extends Seeder
{
    /**
    * Run the database seeds.
    *
    * @return void
    */
    public function run()
    {
        DB::table('blogcomments')->insert([
      'created_at' => Carbon\Carbon::now()->toDateTimeString(),
      'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
      'comment' => 'Comment one',
      'ip' => '123.45.789',
    ]);

        DB::table('blogcomments')->insert([
      'created_at' => Carbon\Carbon::now()->toDateTimeString(),
      'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
      'comment' => 'Comment two',
      'ip' => '222.45.789',
    ]);

        DB::table('blogcomments')->insert([
      'created_at' => Carbon\Carbon::now()->toDateTimeString(),
      'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
      'comment' => 'Comment two',
      'ip' => '333.45.789',
    ]);
    }
}
