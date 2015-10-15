<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCustomTripsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('custom_trips', function(Blueprint $table)
		{
			$table->increments('id');
            $table->dateTime('from');
            $table->datetime('to');
            $table->string('reference_number');
            $table->integer('vehicle_id')->unsigned();
            $table->integer('booking_id')->unsigned();
            $table->text('locations');
            $table->double('amount');
			$table->timestamps();

            $table->foreign('vehicle_id')->references('id')->on('vehicles');
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
		Schema::drop('custom_trips');
	}

}
