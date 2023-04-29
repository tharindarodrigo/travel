<?php

namespace Database\Seeders;

use App\Models\HotelAmenity;
use Illuminate\Database\Seeder;

class HotelAmenitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        HotelAmenity::factory()
            ->count(5)
            ->create();
    }
}
