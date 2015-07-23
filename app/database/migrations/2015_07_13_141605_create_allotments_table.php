<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateAllotmentsTable extends Migration {

	/**
	 * Run the migrations.
	 * @return void
	 */
	public function up()
	{
		Schema::create('allotments', function(Blueprint $table)
		{
			$table->increments('id');
            $table->date('from');
            $table->date('to');
            $table->integer('rooms');
            $table->integer('room_type_id')->unsigned();
            $table->integer('hotel_id')->unsigned();
            $table->integer('user_id')->unsigned();
            $table->boolean('val');
			$table->timestamps();

            $table->foreign('hotel_id')->references('id')->on('hotels');
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
		Schema::drop('allotments');
	}

}
