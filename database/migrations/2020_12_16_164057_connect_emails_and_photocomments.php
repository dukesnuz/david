<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ConnectEmailsAndPhotocomments extends Migration
{
  /**
  * Run the migrations.
  *
  * @return void
  */
  public function up()
  {
    Schema::table('photocomments', function (Blueprint $table) {
      $table->foreign('email_id')->references('id')->on('photocomments');
    });
  }

  /**
  * Reverse the migrations.
  *
  * @return void
  */
  public function down()
  {
    Schema::table('photocomments', function (Blueprint $table) {
      $table->dropForeign('photocomments_email_id_foreign');
    });
  }
}
