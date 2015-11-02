<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateExcursionBookingsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('excursion_bookings', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('booking_id')->unsigned();
            $table->integer('excursion_id')->unsigned();
            $table->integer('excursion_transport_type_id')->unsigned();
            $table->string('reference_number');
            $table->integer('city_id')->unsigned();
            $table->dateTime('date');
            $table->double('unit_price');
            $table->integer('pax');
            $table->timestamps();

            $table->foreign('booking_id')->references('id')->on('bookings');
            $table->foreign('excursion_id')->references('id')->on('excursions');
            $table->foreign('excursion_transport_type_id')->references('id')->on('excursion_transport_types');
            $table->foreign('city_id')->references('id')->on('cities');

        });
    }


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('excursion_bookings');
    }

}
