<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTaxesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('taxes', function(Blueprint $table)
		{
			$table->increments('id');
            $table->boolean('tax_type');
            $table->double('tax_amount');
            $table->boolean('handling_fee_type');
            $table->double('handling_fee');
            $table->boolean('discount_type');
            $table->double('discount');
            $table->integer('room_type_id')->unsigned();

			$table->timestamps();

            $table->foreign('room_type_id')->references('id')->on('room_types');


        });
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('taxes');
	}

}
