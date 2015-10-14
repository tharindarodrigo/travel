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
            $table->integer('hotel_id')->unsigned();
            $table->integer('booking_id')->unsigned();
            $table->date('check_in');
            $table->date('check_out');
            $table->string('reference_number');

            $table->boolean('val');
			$table->timestamps();

            $table->foreign('hotel_id')->references('id')->on('hotels');
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
