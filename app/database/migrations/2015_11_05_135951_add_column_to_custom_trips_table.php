<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddColumnToCustomTripsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('custom_trips', function(Blueprint $table)
		{
			$table->boolean('val')->default(1);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('custom_trips', function(Blueprint $table)
		{
			$table->dropColumn('val');
		});
	}

}
