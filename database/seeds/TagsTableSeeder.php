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
        $data = ['laravel', 'framework', 'Vue.Js', 'git', 'github', 'php', 'server', 'html', 'css', "1980's", 'dance music'];

        foreach ($data as $tagName) {
            $tag = new Tag();
            $tag->name = $tagName;
            $tag->save();
        }
    }
}
