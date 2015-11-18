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
            $table->boolean('payment_status');
            $table->smallInteger('my_booking');
            $table->integer('HSBC_payment_id')->unsigned();
            $table->string('ip_address');
            $table->integer('user_id')->unsigned()->nullable();
            $table->integer('agent_id')->unsigned()->nullable();
            $table->integer('booking_id')->unsigned()->nullable();


            $table->foreign('HSBC_payment_id')->references('id')->on('hsbc_payments');
            $table->foreign('booking_id')->references('id')->on('bookings');
            $table->foreign('agent_id')->references('id')->on('agents');
            $table->foreign('user_id')->references('id')->on('users');
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
            $table->dropColumn('payment_status');
            $table->dropColumn('my_booking');
            $table->dropColumn('ip_address');

            $table->dropForeign('payments_hsbc_payment_id_foreign');
            $table->dropForeign('payments_agent_id_foreign');
            $table->dropForeign('payments_user_id_foreign');
            $table->dropForeign('payments_booking_id_foreign');

            $table->dropColumn('HSBC_payment_id');
            $table->dropColumn('user_id');
            $table->dropColumn('agent_id');
            $table->dropColumn('booking_id');


        });
    }

}
