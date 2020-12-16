<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
  /**
  * Seed the application's database.
  *
  * @return void
  */
  public function run()
  {
    // $this->call(UsersTableSeeder::class);
    $this->call(TagsTableSeeder::class);
    $this->call(CategoriesTableSeeder::class);
    $this->call(UrlsTableSeeder::class);
    $this->call(UrlTagTableSeeder::class);
    $this->call(UsersTableSeeder::class);
    $this->call(SearchesTableSeeder::class);
    $this->call(BlogtagsTableSeeder::class);
    $this->call(BlogcategoriesTableSeeder::class);
    $this->call(BlogpostsTableSeeder::class);
    $this->call(BlogpostBlogtagTableSeeder::class);
    $this->call(BlogcommentsTableSeeder::class);
    $this->call(EmailsTableSeeder::class);
    $this->call(PhotocategoriesTableSeeder::class);
    $this->call(PhotosTableSeeder::class);
    $this->call(PhotosearchesTableSeeder::class);
    $this->call(PhotocommentsTableSeeder::class);
    $this->call(PhototagsTableSeeder::class);
    $this->call(PhototagTagTableSeeder::class);
  }
}
