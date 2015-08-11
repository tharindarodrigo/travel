<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateExcursionTransportTypesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('excursion_transport_types', function(Blueprint $table)
		{
            $table->increments('id');
            $table->string('transport_type');
            $table->integer('excursion_type_id')->unsigned();
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
		Schema::drop('excursion_transport_types');
	}

}
