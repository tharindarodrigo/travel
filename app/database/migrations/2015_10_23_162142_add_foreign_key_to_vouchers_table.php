<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeyToVouchersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('vouchers', function(Blueprint $table)
		{
			$table->foreign('booking_id')->references('id')->on('bookings')->onDelete('cascade');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('vouchers', function(Blueprint $table)
		{
			$table->dropForeign('vouchers_booking_id_foreign');
		});
	}

}
