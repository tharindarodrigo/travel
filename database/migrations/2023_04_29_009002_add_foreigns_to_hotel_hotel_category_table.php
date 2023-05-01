<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('hotel_hotel_category', function (Blueprint $table) {
            $table
                ->foreign('hotel_category_id')
                ->references('id')
                ->on('hotel_categories')
                ->onUpdate('CASCADE')
                ->onDelete('CASCADE');

            $table
                ->foreign('hotel_id')
                ->references('id')
                ->on('hotels')
                ->onUpdate('CASCADE')
                ->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('hotel_hotel_category', function (Blueprint $table) {
            $table->dropForeign(['hotel_category_id']);
            $table->dropForeign(['hotel_id']);
        });
    }
};
