<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCancellationPoliciesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('cancellation_policies', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('hotel_id')->unsigned();
			$table->string('from');
			$table->string('to');
			$table->string('percentage_charged');
			$table->timestamps();

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
		Schema::drop('cancelation_policies');
	}

}
