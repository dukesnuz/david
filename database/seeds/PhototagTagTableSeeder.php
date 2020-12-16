<?php

use Illuminate\Database\Seeder;
use David\Photo;
use David\Phototag;

class PhototagTagTableSeeder extends Seeder
{
  /**
  * Run the database seeds.
  *
  * @return void
  */
  public function run()
  {
    # First, create an array of all the books we want to associate tags with
    # The *key* will be the book title, and the *value* will be an array of tags.
    $photos =[
      'title 1' => ['tag1', 'tag2', 'tag3'],
      'title 2' => ['tag2', 'tag1', 'tag3'],
      'title 3' => ['tag3', 'tag2', 'tag3'],
    ];

    # Now loop through the above array, creating a new pivot for each book to tag
    foreach($photos as $title => $tags) {
      # First get the book
      $photo = Photo::where('title','like',$title)->first();
      # Now loop through each tag for this book, adding the pivot
      foreach($tags as $tagName) {
        $tag = Phototag::where('name','LIKE',$tagName)->first();
        # Connect this tag to this book
        $photo->phototags()->save($tag);
      }

    }
  }
}
