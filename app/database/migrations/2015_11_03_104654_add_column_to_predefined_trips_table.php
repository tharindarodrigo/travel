<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddColumnToPredefinedTripsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('predefined_trips', function(Blueprint $table)
		{
			$table->string('reference_number');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('predefined_trips', function(Blueprint $table)
		{
			$table->dropColumn('reference_number');
		});
	}

}
