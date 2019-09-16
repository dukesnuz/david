<?php

use Illuminate\Database\Seeder;
use David\Tag;

class TagsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = ['laravel', 'framework', 'php', 'version control'];

        foreach ($data as $tagName) {
            $tag = new Tag();
            $tag->name = $tagName;
            $tag->save();
        }
    }
}
