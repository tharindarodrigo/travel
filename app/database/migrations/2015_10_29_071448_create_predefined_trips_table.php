<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePredefinedTripsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('predefined_trips', function (Blueprint $table) {
            $table->increments('id');
            $table->dateTime('pick_up_date_time');
            $table->smallInteger('count');
            $table->integer('booking_id')->unsigned();
            $table->integer('transport_package_id')->unsigned();
            $table->timestamps();

            $table->foreign('booking_id')->references('id')->on('bookings');
            $table->foreign('transport_package_id')->references('id')->on('users');

        });
    }


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('predefined_trips');
    }

}
