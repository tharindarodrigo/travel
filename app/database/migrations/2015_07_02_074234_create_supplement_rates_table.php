<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSupplementRatesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('supplement_rates', function(Blueprint $table)
		{
            $table->increments('id');
            $table->String('supplement_name');
            $table->date('from');
            $table->date('to');
            $table->double('count')->nullable();
//            $table->double('allotment')->nullable();
            $table->double('rate');
            $table->integer('val');
            $table->integer('hotel_id')->unsigned();
            $table->integer('room_type_id')->unsigned();
            $table->integer('room_specification_id')->unsigned();
            $table->integer('market_id')->unsigned();
            $table->integer('meal_basis_id')->unsigned();
            $table->integer('user_id')->unsigned();
            $table->timestamps();

            $table->foreign('hotel_id')->references('id')->on('hotels');
            $table->foreign('room_type_id')->references('id')->on('room_types');
            $table->foreign('room_specification_id')->references('id')->on('room_specifications');
            $table->foreign('market_id')->references('id')->on('markets');
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('meal_basis_id')->references('id')->on('meal_bases');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('supplement_rates');
	}

}
