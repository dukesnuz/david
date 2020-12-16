<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePhotosearchesTable extends Migration
{
  /**
  * Run the migrations.
  *
  * @return void
  */
  public function up()
  {
    Schema::create('photosearches', function (Blueprint $table) {
      $table->increments('id');
      $table->timestamps();
      $table->string('term', 100);
      $table->integer('user_id')->unsigned()->default(0);
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
    Schema::dropIfExists('photosearches');
  }
}
