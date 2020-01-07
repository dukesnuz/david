<?php

use Illuminate\Database\Seeder;
use David\Blogtag;

class BlogtagsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = ['laravel', 'framework', 'VueJs', 'git', 'github', 'php', 'server', 'html', 'css', 'styling', "1980", 'dance music'];

        foreach ($data as $tagName) {
            $tag = new Blogtag();
            $tag->name = $tagName;
            $tag->save();
        }
    }
}
