<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTransportPackagesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('transport_packages', function(Blueprint $table)
		{
			$table->increments('id');
            $table->integer('vehicle_id')->unsigned();
            $table->double('millage');
            $table->integer('days');
            $table->integer('nights')->nullable();
            $table->integer('origin')->unsigned();
            $table->integer('destination')->unsigned();
            $table->date('start_date');
            $table->date('end_date');
            $table->double('rate');
			$table->timestamps();

            $table->foreign('vehicle_id')->references('id')->on('vehicles');
            $table->foreign('origin')->references('id')->on('cities');
            $table->foreign('destination')->references('id')->on('cities');

		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('transport_packages');
	}

}
