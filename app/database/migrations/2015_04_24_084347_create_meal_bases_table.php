<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateMealBasesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('meal_bases', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('meal_basis', 2);
			$table->string('meal_basis_name');
			$table->text('description');
            $table->boolean('val');
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
		Schema::drop('meal_bases');
	}

}
