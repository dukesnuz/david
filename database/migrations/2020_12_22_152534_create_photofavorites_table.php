<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePhotofavoritesTable extends Migration
{
  /**
  * Run the migrations.
  *
  * @return void
  */
  public function up()
  {
    Schema::create('photofavorites', function (Blueprint $table) {
      //$table->bigIncrements('id');
      $table->increments('id');
      $table->timestamps();
      $table->tinyInteger('is_live')->default(0);
      $table->unsignedInteger('auth_by');
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
    Schema::dropIfExists('photofavorites');
  }
}
