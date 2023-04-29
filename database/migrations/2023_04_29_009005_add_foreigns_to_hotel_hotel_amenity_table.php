<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('hotel_hotel_amenity', function (Blueprint $table) {
            $table
                ->foreign('hotel_amenity_id')
                ->references('id')
                ->on('hotel_amenities')
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
        Schema::table('hotel_hotel_amenity', function (Blueprint $table) {
            $table->dropForeign(['hotel_amenity_id']);
            $table->dropForeign(['hotel_id']);
        });
    }
};
