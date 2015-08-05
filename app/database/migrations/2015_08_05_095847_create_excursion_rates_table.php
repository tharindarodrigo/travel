<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateExcursionRatesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('excursion_rates', function(Blueprint $table)
		{
			$table->increments('id');
            $table->integer('excursion_id')->unsigned();
            $table->integer('city_id')->unsigned();
            $table->integer('excursion_transport_type_id')->unsigned();
            $table->double('rate');
            $table->boolean('val');
			$table->timestamps();

            $table->foreign('excursion_id')->references('id')->on('excursions');
            $table->foreign('excursion_transport_type_id')->references('id')->on('excursion_transport_types');
            $table->foreign('city_id')->references('id')->on('cities');

		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('excursion_rates');
	}

}
