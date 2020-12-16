<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ConnectPhotocategoriesAndPhotos extends Migration
{
  /**
  * Run the migrations.
  *
  * @return void
  */
  public function up()
  {
    Schema::table('photos', function (Blueprint $table) {
      $table->integer('category_id')->unsigned();
      $table->foreign('category_id')->references('id')->on('photocategories');
    });
  }

  /**
  * Reverse the migrations.
  *
  * @return void
  */
  public function down()
  {
    Schema::table('photos', function (Blueprint $table) {
      # ref: http://laravel.com/docs/migrations#dropping-indexes
      # combine tablename + fk field name + the word "foreign"
      $table->dropForeign('photos_category_id_foreign');
      $table->dropColumn('category_id');
    });
  }
}
