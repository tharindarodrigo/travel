<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateHotelHotelFacilityTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('hotel_hotel_facility', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('hotel_id')->unsigned()->index();
			$table->foreign('hotel_id')->references('id')->on('hotels')->onDelete('cascade');
			$table->integer('hotel_facility_id')->unsigned()->index();
			$table->foreign('hotel_facility_id')->references('id')->on('hotel_facilities')->onDelete('cascade');
			$table->timestamps();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('hotel_hotel_facility');
	}

}
