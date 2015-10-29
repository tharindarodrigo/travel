<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddColumnsToAgentsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('agents', function (Blueprint $table) {
            $table->string('fax');
            $table->integer('country_id')->unsigned();
            $table->integer('user_id')->unsigned();

            $table->foreign('country_id')->references('id')->on('countries');
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
        Schema::table('agents', function (Blueprint $table) {
            $table->dropForeign('agents_country_id_foreign');
            $table->dropForeign('agents_user_id_foreign');
            $table->dropColumn('fax');
            $table->dropColumn('country_id');
            $table->dropColumn('user_id');

        });
    }

}
