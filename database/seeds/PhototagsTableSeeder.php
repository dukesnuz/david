<?php

use Illuminate\Database\Seeder;
use David\Phototag;

class PhototagsTableSeeder extends Seeder
{
  /**
  * Run the database seeds.
  *
  * @return void
  */
  public function run()
  {
    $data = ['tag1', 'tag2', 'tag3', 'tag4'];

    foreach($data as $tagName) {
      $tag = new Phototag();
      $tag->name = $tagName;
      $tag->save();
    }
  }
}
