<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddColumnsToPaymentsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('payments', function (Blueprint $table) {
            $table->booelan('payment_status');
            $table->smallInteger('my_booking');
            $table->integer('HSBC_payment_id')->unsigned();
            $table->string('ip_address');
            $table->boolean('');

            $table->foreign('HSBC_payment_id')->references('id')->on('hsbc_payments');
        });
    }


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('payments', function (Blueprint $table) {

        });
    }

}
