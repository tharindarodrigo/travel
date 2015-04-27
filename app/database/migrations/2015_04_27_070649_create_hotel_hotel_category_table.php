<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateHotelHotelCategoryTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('hotel_hotel_category', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('hotel_id')->unsigned()->index();
			$table->foreign('hotel_id')->references('id')->on('hotels')->onDelete('cascade');
			$table->integer('hotel_category_id')->unsigned()->index();
			$table->foreign('hotel_category_id')->references('id')->on('hotel_categories')->onDelete('cascade');
			$table->timestamps();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('hotel_hotel_category');
	}

}
