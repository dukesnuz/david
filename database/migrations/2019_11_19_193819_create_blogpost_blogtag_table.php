<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBlogpostBlogtagTable extends Migration
{
    /**
    * Run the migrations.
    *
    * @return void
    */
    public function up()
    {
        Schema::create('blogpost_blogtag', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();

            $table->integer('blogpost_id')->unsigned();
            $table->integer('blogtag_id')->unsigned();

            # Make foreign keys
            $table->foreign('blogpost_id')->references('id')->on('blogposts');
            $table->foreign('blogtag_id')->references('id')->on('blogtags');
        });
    }

    /**
    * Reverse the migrations.
    *
    * @return void
    */
    public function down()
    {
        Schema::dropIfExists('blogpost_blogtag');
    }
}
