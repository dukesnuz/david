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
      'email_id' => 1,
      'blogpost_id' => 1,
      'ip' => '123.45.789',
    ]);

        DB::table('blogcomments')->insert([
      'created_at' => Carbon\Carbon::now()->toDateTimeString(),
      'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
      'comment' => 'Comment two',
      'email_id' => 2,
      'blogpost_id' => 2,
      'ip' => '222.45.789',
    ]);

        DB::table('blogcomments')->insert([
      'created_at' => Carbon\Carbon::now()->toDateTimeString(),
      'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
      'comment' => 'Comment three',
      'email_id' => 3,
      'blogpost_id' => 3,
      'ip' => '333.45.789',
    ]);
    }
}
