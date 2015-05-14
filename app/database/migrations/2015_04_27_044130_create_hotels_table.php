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
            $table->integer('city_id')->unsigned();
            $table->integer('users_id')->unsigned();
            $table->integer('star_id')->unsigned();
            $table->boolean('val');

            $table->double('longitude');
            $table->double('latitude');

            $table->string('meta_keywords');
            $table->string('meta_description');

            $table->text('overview');

            $table->string('rooms');
            $table->string('terms_and_conditions');
            $table->string('infant_age');
            $table->string('infant_charge');

            $table->string('child_age');
            $table->string('child_charge');

            $table->timestamps();

            $table->foreign('city_id')->references('id')->on('cities');
            $table->foreign('users_id')->references('id')->on('users');
            $table->foreign('star_id')->references('id')->on('star_categories');

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
