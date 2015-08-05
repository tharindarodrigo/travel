<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateExcursionDatesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('excursion_dates', function(Blueprint $table)
		{
			$table->increments('id');
            $table->date('from');
            $table->date('to');
            $table->integer('excursion_id')->unsigned();
            $table->boolean('val');
			$table->timestamps();

            $table->foreign('excursion_id')->references('id')->on('excursions');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('excursion_dates');
	}

}
