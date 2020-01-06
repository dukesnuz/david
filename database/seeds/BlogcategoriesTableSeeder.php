<?php

use Illuminate\Database\Seeder;

class BlogcategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('blogcategories')->insert([
       'created_at' => Carbon\Carbon::now()->toDateTimeString(),
       'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
       'categorys' => 'Laravel',
     ]);

        DB::table('blogcategories')->insert([
       'created_at' => Carbon\Carbon::now()->toDateTimeString(),
       'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
       'categorys' => 'Transportation',
     ]);

        DB::table('blogcategories')->insert([
       'created_at' => Carbon\Carbon::now()->toDateTimeString(),
       'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
       'categorys' => 'Music',
     ]);

        DB::table('blogcategories')->insert([
       'created_at' => Carbon\Carbon::now()->toDateTimeString(),
       'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
       'categorys' => 'Web Development',
     ]);
    }
}
