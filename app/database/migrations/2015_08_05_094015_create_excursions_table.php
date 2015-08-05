<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateExcursionsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('excursions', function(Blueprint $table)
		{
			$table->increments('id');
            $table->string('excursion');
            $table->string('short_description');
            $table->string('description');
            $table->integer('excursion_type_id')->unsigned();
            $table->boolean('val');
			$table->timestamps();

            $table->foreign('excursion_type_id')->references('id')->on('excursion_types');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('excursions');
	}

}
