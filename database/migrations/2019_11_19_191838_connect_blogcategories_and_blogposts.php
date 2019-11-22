<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ConnectBlogcategoriesAndBlogposts extends Migration
{
    /**
    * Run the migrations.
    *
    * @return void
    */
    public function up()
    {
        Schema::table('blogposts', function (Blueprint $table) {
            $table->integer('category_id')->unsigned();

            $table->foreign('category_id')->references('id')->on('blogcategories');
        });
    }

    /**
    * Reverse the migrations.
    *
    * @return void
    */
    public function down()
    {
        Schema::table('blogposts', function (Blueprint $table) {

      # ref: http://laravel.com/docs/migrations#dropping-indexes
            # combine tablename + fk field name + the word "foreign"
            $table->dropForeign('blogposts_category_id_foreign');

            $table->dropColumn('category_id');
        });
    }
}
