<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateRoomBookingsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('room_bookings', function(Blueprint $table)
		{
			$table->increments('id');
            $table->integer('room_type_id')->unsigned();
            $table->integer('meal_basis_id')->unsigned();
            $table->integer('room_specification_id')->unsigned();
            $table->integer('voucher_id')->unsigned();
            $table->smallInteger('room_count');
            $table->double('amount');
			$table->timestamps();

            $table->foreign('meal_basis_id')->references('id')->on('meal_bases');
            $table->foreign('voucher_id')->references('id')->on('vouchers')->onDelete('cascade');
            $table->foreign('room_specification_id')->references('id')->on('room_specifications');
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
		Schema::drop('room_bookings');
	}

}
