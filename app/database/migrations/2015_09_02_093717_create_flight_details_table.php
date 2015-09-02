<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateFlightDetailsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('flight_details', function(Blueprint $table)
		{
			$table->increments('id');
            $table->integer('booking_id')->unsigned();
            $table->date('date');
            $table->time('time');
            $table->string('flight_number');
            $table->boolean('ad');
			$table->timestamps();

            $table->foreign('booking_id')->references('id')->on('bookings');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('flight_details');
	}

}
