<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class DropColumnsFromAgentsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        Schema::table('agents', function($table)
        {
            $table->dropColumn('market_id');
        });
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::create('agents', function(Blueprint $table)
		{
			$table->increments('id');
			$table->timestamps();
		});
	}

}
