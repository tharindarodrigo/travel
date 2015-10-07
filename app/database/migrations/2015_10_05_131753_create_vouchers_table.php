<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateVouchersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('vouchers', function(Blueprint $table)
		{
			$table->increments('id');
            $table->date('check_in');
            $table->date('check_out');
            $table->smallInteger('room_count');

            $table->integer('room_type_id')->unsigned();
            $table->integer('hotel_id')->unsigned();
            $table->integer('meal_basis_id')->unsigned();
            $table->integer('booking_id')->unsigned();
            $table->double('amount');
            $table->boolean('val');
			$table->timestamps();

            $table->foreign('meal_basis_id')->references('id')->on('meal_bases');
            $table->foreign('booking_id')->references('id')->on('bookings');
            $table->foreign('hotel_id')->references('id')->on('hotels');
            $table->foreign('room_type_id')->references('id')->on('room_types');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('vouchers');
	}

}
