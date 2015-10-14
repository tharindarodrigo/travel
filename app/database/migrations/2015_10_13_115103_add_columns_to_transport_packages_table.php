<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddColumnsToTransportPackagesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('transport_packages', function(Blueprint $table)
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
		Schema::table('transport_packages', function(Blueprint $table)
		{
			$table->dropColumn(array('millage','val'));
		});
	}

}
