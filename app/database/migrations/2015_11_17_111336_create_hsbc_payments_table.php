<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateHsbcPaymentsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('hsbc_payments', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('HSBC_payment_id');
			$table->string('currency');
			$table->string('vpc_txn_res_code');
			$table->string('qsi_res_code');
			$table->string('vpc_message');
			$table->string('vpc_receipt_number');
			$table->string('vpc_txn_no');
			$table->string('vpc_acq_res_code');
			$table->string('vpc_bank_auth_id');
			$table->string('vpc_batch_no');
			$table->string('card_type');
			$table->string('vpc_merchant');
			$table->string('vpc_command');
			$table->string('vpc_version');
			$table->string('vpc_Locale');
			$table->string('vpc_OrderInfo');
			$table->double('paid_amount');
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
		Schema::drop('hsbc_payments');
	}

}
