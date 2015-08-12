<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTourTypesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('tour_types', function(Blueprint $table)
		{
			$table->increments('id');
            $table->integer('tour_id')->unsigned();
            $table->string('tour_type_title');
            $table->text('short_description');
            $table->text('description');
            $table->boolean('val');
			$table->timestamps();

            $table->foreign('tour_id')->references('id')->on('tours');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('tour_types');
	}

}
