<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateHotelReviewsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('hotel_reviews', function(Blueprint $table)
		{
			$table->increments('id');
			$table->text('review');
			$table->integer('hotel_id')->unsigned();
			$table->integer('user_id')->unsigned();

			$table->timestamps();

            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('hotel_id')->references('id')->on('hotels');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('hotel_reviews');
	}

}
