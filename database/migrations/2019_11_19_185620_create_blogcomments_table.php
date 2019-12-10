<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBlogcommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blogcomments', function (Blueprint $table) {
            //$table->bigIncrements('id');
            $table->increments('id');
            $table->timestamps();
            $table->string('comment', 255);
            $table->tinyInteger('is_live')->default(0);
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
        Schema::dropIfExists('blogcomments');
    }
}
