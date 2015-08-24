<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddColumnsToMarketsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('markets', function(Blueprint $table)
		{
			$table->double('tax');
			$table->boolean('tax_type');
			$table->double('handling_fee');
			$table->boolean('handling_fee_type');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('markets', function(Blueprint $table)
		{
			
		});
	}

}
