<?php

use Illuminate\Database\Seeder;
use David\Photo;

class PhotocommentsTableSeeder extends Seeder
{
  /**
  * Run the database seeds.
  *
  * @return void
  */
  public function run()
  {
    $photo_id = Photo::where('title','=','title 1')->pluck('id')->first();

    DB::table('photocomments')->insert([
      'created_at' => Carbon\Carbon::now()->toDateTimeString(),
      'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
      'comment' => 'Comment one',
      'email_id' => 1,
      'photo_id' => $photo_id,
      'ip' => '123.45.789',
    ]);

$photo_id = Photo::where('title','=','title 2')->pluck('id')->first();

    DB::table('photocomments')->insert([
      'created_at' => Carbon\Carbon::now()->toDateTimeString(),
      'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
      'comment' => 'Comment three',
      'email_id' => 2,
      'photo_id' => $photo_id,
      'ip' => '222.45.789',
    ]);

$photo_id = Photo::where('title','=','title 3')->pluck('id')->first();

    DB::table('photocomments')->insert([
      'created_at' => Carbon\Carbon::now()->toDateTimeString(),
      'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
      'comment' => 'Comment three',
      'email_id' => 3,
      'photo_id' => $photo_id,
      'ip' => '333.45.789',
    ]);
  }
}
