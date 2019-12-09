<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ConnectBlogcommentsAndEmails extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('blogcomments', function (Blueprint $table) {
            $table->integer('email_id')->unsigned();
            $table->foreign('email_id')->references('id')->on('blogcomments');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('blogcomments', function (Blueprint $table) {
            $table->dropForeign('blogcomments_email_id_foreign');
            $table->dropColumn('email_id');
        });
    }
}
