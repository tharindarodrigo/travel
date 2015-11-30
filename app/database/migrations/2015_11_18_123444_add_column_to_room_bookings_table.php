<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddColumnToRoomBookingsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('room_bookings', function(Blueprint $table)
		{
			$table->double('unit_cost_price');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('room_bookings', function(Blueprint $table)
		{
			$table->dropColumn('unit_cost_price');
		});
	}

}
