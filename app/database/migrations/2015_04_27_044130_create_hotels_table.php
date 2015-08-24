<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateHotelsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('hotels', function(Blueprint $table)
		{
			$table->increments('id');
            $table->string('name');
            $table->string('address');
            $table->integer('country_id')->unsigned();
            $table->integer('city_id')->unsigned();
            $table->integer('user_id')->unsigned();
            $table->integer('star_category_id')->unsigned();
            $table->boolean('val');

            $table->double('longitude')->default(0.0);
            $table->double('latitude')->default(0.0);

            $table->string('search_keywords')->nullable();
            $table->string('search_description')->nullable();

            $table->text('overview')->nullable();

            $table->text('rooms')->nullable();
            $table->text('terms_and_conditions')->nullable();
            $table->string('infant_age')->nullable();
            $table->string('infant_charge')->nullable();

            $table->string('child_age')->nullable();
            $table->string('child_charge')->nullable();
            $table->time('check_in_time')->nullable();
            $table->time('check_out_time')->nullable();

            $table->timestamps();

            $table->foreign('city_id')->references('id')->on('cities');
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('star_category_id')->references('id')->on('star_categories');

        });
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('hotels');
	}

}
