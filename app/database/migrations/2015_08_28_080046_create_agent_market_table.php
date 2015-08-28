<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateAgentMarketTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('agent_market', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('agent_id')->unsigned()->index();
			$table->foreign('agent_id')->references('id')->on('agents')->onDelete('cascade');
			$table->integer('market_id')->unsigned()->index();
			$table->foreign('market_id')->references('id')->on('markets')->onDelete('cascade');
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
		Schema::drop('agent_market');
	}

}
