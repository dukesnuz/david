<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ConnectBlogcommentsAndBlogposts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('blogcomments', function (Blueprint $table) {
            $table->integer('blogpost_id')->unsigned();
            $table->foreign('blogpost_id')->references('id')->on('blogposts');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        $table->dropForeign('blogcomments_blogpost_id_foreign');

        $table->dropColumn('blogpost_id');
    }
}
