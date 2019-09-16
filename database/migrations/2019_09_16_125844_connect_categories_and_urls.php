<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ConnectCategoriesAndUrls extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */

    public function up()
    {
        Schema::table('urls', function (Blueprint $table) {

           # Remove the field associated with the old way we were storing authors
            # Whether you need this or not depends on whether your books table is built with an authors column
            # $table->dropColumn('author');

            # Add a new INT field called `author_id` that has to be unsigned (i.e. positive)


            # This field `author_id` is a foreign key that connects to the `id` field in the `authors` table
            $table->foreign('category_id')->references('id')->on('categories');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('urls', function (Blueprint $table) {

      # ref: http://laravel.com/docs/migrations#dropping-indexes
            # combine tablename + fk field name + the word "foreign"
            $table->dropForeign('urls_category_id_foreign');

            $table->dropColumn('category_id');
        });
    }
}
