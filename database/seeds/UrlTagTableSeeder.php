<?php

use Illuminate\Database\Seeder;
use David\Url;
use David\Tag;

class UrlTagTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        # First, create an array of all the urls we want to associate tags with
        # The *key* will be the book title, and the *value* will be an array of tags.
        $urls =[
        'Laravel' => ['framework','laravel','php'],
        'Git' => ['git','github'],
        'PHP' => ['server', 'php'],
];

        # Now loop through the above array, creating a new pivot for each url to tag
        foreach ($urls as $subject => $tags) {

          # First get the url
            $url = Url::where('subject', 'like', $subject)->first();

            # Now loop through each tag for this url, adding the pivot
            foreach ($tags as $tagName) {
                $tag = Tag::where('name', 'LIKE', $tagName)->first();

                # Connect this tag to this url
                $url->tags()->save($tag);
            }
        }
    }
}
