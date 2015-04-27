<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateRatesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('rates', function(Blueprint $table)
		{
			$table->increments('id');
            $table->date('fdate');
            $table->date('tdate');
            $table->double('sgl');
            $table->double('dbl');
            $table->double('tpl');
            $table->double('qpl');
            $table->double('child_with_extra_bed');
            $table->double('child_without_extra_bed');
            $table->double('guide_rate');
            $table->double('count');
            $table->integer('val');
            $table->integer('hotel_id')->unsigned();
            $table->integer('room_type_id')->unsigned();
            $table->integer('market_id')->unsigned();
            $table->integer('user_id')->unsigned();
            $table->integer('meal_basis_id')->unsigned();
			$table->timestamps();

            $table->foreign('hotel_id')->references('id')->on('hotels');
            $table->foreign('room_type_id')->references('id')->on('room_types');
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
		Schema::drop('rates');
	}

}
