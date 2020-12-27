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
            $table->integer('user_id')->unsigned();
            $table->integer('photo_id')->unsigned();
            $table->tinyInteger('is_live')->default(1);
            $table->ipAddress('ip');
            $table->softDeletes();

            # Make foreign keys
           $table->foreign('photo_id')->references('id')->on('photos');
           $table->foreign('user_id')->references('id')->on('users');
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
