<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePhotoPhototagTable extends Migration
{
  /**
  * Run the migrations.
  *
  * @return void
  */
  public function up()
  {
    Schema::create('photo_phototag', function (Blueprint $table) {
      //$table->bigIncrements('id');
      $table->increments('id');
      $table->timestamps();

      # `book_id` and `tag_id` will be foreign keys, so they have to be unsigned
      #  Note how the field names here correspond to the tables they will connect...
      # `book_id` will reference the `books table` and `tag_id` will reference the `tags` table.
      $table->integer('photo_id')->unsigned();
      $table->integer('phototag_id')->unsigned();

      # Make foreign keys
      $table->foreign('photo_id')->references('id')->on('photos');
      $table->foreign('phototag_id')->references('id')->on('phototags');
    });
  }

  /**
  * Reverse the migrations.
  *
  * @return void
  */
  public function down()
  {
    Schema::dropIfExists('photo_phototag');
  }
}
