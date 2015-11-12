<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddColumnToVehiclesTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('vehicles', function (Blueprint $table) {
            $table->double('rate');
            $table->double('additional_charge_per_km');
            $table->double('additional_charge_per_day');
        });
    }


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('vehicles', function (Blueprint $table) {
            $table->dropColumn('additional_charge_per_km');
            $table->dropColumn('additional_charge_per_day');
            $table->dropColumn('rate');

        });
    }

}
