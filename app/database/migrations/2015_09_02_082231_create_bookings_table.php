<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateBookingsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('bookings', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('reference_number');
			$table->string('booking_name');
			$table->integer('adults');
			$table->integer('children');
			$table->string('tour');
			$table->date('arrival_date');
			$table->date('departure_date');
			$table->text('remarks');
			$table->integer('user_id')->unsigned();
			$table->boolean('val');

			$table->timestamps();

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
		Schema::drop('bookings');
	}

}
