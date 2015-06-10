<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateRoomSpecificationsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('room_specifications', function(Blueprint $table)
		{
			$table->increments('id');
            $table->string('room_specification');
            $table->tinyInteger('adults');
            $table->tinyInteger('children');
            $table->boolean('val');
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
		Schema::drop('room_specifications');
	}

}
