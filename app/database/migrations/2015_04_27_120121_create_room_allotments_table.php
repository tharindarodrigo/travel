<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateRoomAllotmentsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('room_allotments', function(Blueprint $table)
		{
			$table->increments('id');
            $table->date('from');
            $table->date('to');
            $table->smallInteger('rooms');
            $table->smallInteger('sold_rooms');
            $table->boolean('val');
            $table->string('remarks');
            $table->integer('hotel_id')->unsigned();
            $table->integer('room_type_id')->unsigned();
            $table->string('user_id')->unsigned();

			$table->timestamps();

            $table->foreign('hotel_id')->references('id')->on('users');
            $table->foreign('room_type_id')->references('id')->on('room_types');
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
		Schema::drop('room_allotments');
	}

}
