<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBlogsearchesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blogsearches', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('term', 100);
            $table->integer('user_id')->unsigned()->default(0);
            $table->ipAddress('ip');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('blogsearches');
    }
}
