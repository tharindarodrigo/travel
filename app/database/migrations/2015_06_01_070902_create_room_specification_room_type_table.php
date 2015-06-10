<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateRoomSpecificationRoomTypeTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('room_specification_room_type', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('room_specification_id')->unsigned()->index();
			$table->foreign('room_specification_id')->references('id')->on('room_specifications')->onDelete('cascade');
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
		Schema::drop('room_specification_room_type');
	}

}
