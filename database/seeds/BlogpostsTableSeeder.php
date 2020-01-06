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
      'meta_description' => "post one meta description",
      'url_friendly' => 'post one url',
      'blogcategory_id' => 1,
      'is_live' => 1,
      'ip' => '111.45.789',
    ]);

        DB::table('blogposts')->insert([
      'created_at' => Carbon\Carbon::now()->toDateTimeString(),
      'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
      'subject' => "Subject Two",
      'body' => 'Post two',
      'meta_description' => "post two meta description",
      'url_friendly' => 'post two url',
      'blogcategory_id' => 2,
      'ip' => '222.45.789',
    ]);

        DB::table('blogposts')->insert([
      'created_at' => Carbon\Carbon::now()->toDateTimeString(),
      'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
      'subject' => "Subject Three",
      'body' => 'Post three',
      'meta_description' => "post two meta description",
      'url_friendly' => 'post two url',
      'blogcategory_id' => 3,
      'ip' => '333.45.789',
    ]);
    }
}
