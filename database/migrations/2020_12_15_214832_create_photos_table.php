<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePhotosTable extends Migration
{
  /**
  * Run the migrations.
  *
  * @return void
  */
  public function up()
  {
    Schema::create('photos', function (Blueprint $table) {
      //$table->bigIncrements('id');
      $table->increments('id');
      $table->timestamps();
      $table->string('title', 150)->nullable();
      $table->string('caption', 150)->nullable();
      $table->string('path', 200);
      $table->double('size', 8, 2)->default(0);
      $table->string('meta_description', 250);
      $table->string('url_friendly', 250);
      $table->tinyInteger('is_live')->default(0);
      $table->unsignedInteger('auth_by')->unsigned();
      $table->ipAddress('ip');
      $table->softDeletes();
    });
  }

  /**
  * Reverse the migrations.
  *
  * @return void
  */
  public function down()
  {
    Schema::dropIfExists('photos');
  }
}
