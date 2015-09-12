<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateClientsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('clients', function(Blueprint $table)
		{
			$table->increments('id');
            $table->string('name');
            $table->string('passport_number');
            $table->date('dob');
            $table->boolean('gender'); // male = 1 , female = 0
            $table->integer('booking_id')->unsigned();
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
		Schema::drop('clients');
	}

}
