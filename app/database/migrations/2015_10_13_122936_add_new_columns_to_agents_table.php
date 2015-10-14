<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddNewColumnsToAgentsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('agents', function(Blueprint $table)
		{
            $table->dropColumn('name');
			$table->string('company');
			$table->string('address');
			$table->string('email');
			$table->string('phone');
            $table->float('tax');
            $table->boolean('tax_type');
			$table->float('handling_fee');
			$table->boolean('handling_fee_type');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('agents', function(Blueprint $table)
		{
			$table->dropColumn(array('company','address','email','phone','tax','tax_type','handling_fee','handling_fee_type'));
		});
	}

}
