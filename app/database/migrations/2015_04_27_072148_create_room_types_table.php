<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateRoomTypesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('room_types', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('room_type');
			$table->text('description');
			$table->integer('users_id');
			$table->integer('hotel_id');
			$table->boolean('val');
			$table->timestamps();

            $table->foreign('users_id')->references('id')->on('users');
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
		Schema::drop('room_types');
	}

}
