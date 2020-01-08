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
        $data = ['laravel', 'framework', 'vuejs', 'git', 'github', 'php', 'server', 'html', 'css', 'styling', 'internet',"networking", 'javascript'];

        foreach ($data as $tagName) {
            $tag = new Blogtag();
            $tag->name = $tagName;
            $tag->save();
        }
    }
}
