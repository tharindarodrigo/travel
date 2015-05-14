<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCitiesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('cities', function(Blueprint $table)
		{
			$table->increments('id');
            $table->string('city');
            $table->double('longitude')->nullable();
            $table->double('latitude')->nullable();
            $table->integer('country_id')->unsigned();
            $table->boolean('val');
			$table->timestamps();

            $table->foreign('country_id')->references('id')->on('countries');

		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('cities');
	}

}
