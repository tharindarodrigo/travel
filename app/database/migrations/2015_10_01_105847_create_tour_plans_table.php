<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTourPlansTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('tour_plans', function(Blueprint $table)
		{
			$table->increments('id');
            $table->string('days');
            $table->text('description');
            $table->integer('tour_type_id')->unsigned();
			$table->timestamps();

            $table->foreign('tour_type_id')->references('id')->on('tour_types');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('tour_plans');
	}

}
