<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateRoomFacilityRoomTypeTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('room_facility_room_type', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('room_facility_id')->unsigned()->index();
			$table->foreign('room_facility_id')->references('id')->on('room_facilities')->onDelete('cascade');
			$table->integer('room_type_id')->unsigned()->index();
			$table->foreign('room_type_id')->references('id')->on('room_types')->onDelete('cascade');
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
		Schema::drop('room_facility_room_type');
	}

}
