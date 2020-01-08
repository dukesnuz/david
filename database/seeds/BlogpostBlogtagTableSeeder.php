<?php

use Illuminate\Database\Seeder;

use David\Blogpost;
use David\Blogtag;

class BlogpostBlogtagTableSeeder extends Seeder
{
    /**
    * Run the database seeds.
    *
    * @return void
    */
    public function run()
    {
        $urls =[
      'Post one' => ['framework','laravel','php'],
      'Post two' => ["networking", 'internet'],
      'Post three' => ['css', 'styling'],
    ];


        # Now loop through the above array, creating a new pivot for each url to tag
        foreach ($urls as $body => $tags) {

      # First get the url
            $url = Blogpost::where('body', 'like', $body)->first();

            # Now loop through each tag for this url, adding the pivot
            foreach ($tags as $tagName) {
                $tag = Blogtag::where('name', 'LIKE', $tagName)->first();
                # Connect this tag to this url
                $url->blogtags()->save($tag);
            }
        }
    }
}
