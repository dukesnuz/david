<?php

use Illuminate\Database\Seeder;

class BlogpostsTableSeeder extends Seeder
{
    /**
    * Run the database seeds.
    *
    * @return void
    */
    public function run()
    {
        DB::table('blogposts')->insert([
      'created_at' => Carbon\Carbon::now()->toDateTimeString(),
      'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
      'subject' => "Subject One",
      'body' => 'Post one',
      'category_id' => 1,
      'ip' => '111.45.789',
    ]);

        DB::table('blogposts')->insert([
      'created_at' => Carbon\Carbon::now()->toDateTimeString(),
      'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
      'subject' => "Subject Two",
      'body' => 'Post two',
      'category_id' => 2,
      'ip' => '222.45.789',
    ]);

        DB::table('blogposts')->insert([
      'created_at' => Carbon\Carbon::now()->toDateTimeString(),
      'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
      'subject' => "Subject Three",
      'body' => 'Post three',
      'category_id' => 3,
      'ip' => '333.45.789',
    ]);
    }
}
