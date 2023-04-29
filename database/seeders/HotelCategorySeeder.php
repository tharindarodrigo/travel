<?php

namespace Database\Seeders;

use App\Models\HotelCategory;
use Illuminate\Database\Seeder;

class HotelCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        HotelCategory::insert([
            ['name' => "Luxury hotels"],
            ['name' => "Full-service hotels"],
            ['name' => "Boutique hotels"],
            ['name' => "Resort hotels"],
            ['name' => "Extended-stay hotels"],
            ['name' => "Budget hotels"],
            ['name' => "Economy hotels"],
            ['name' => "Bed and Breakfasts (B&Bs)"],
            ['name' => "Hostels"],
            ['name' => "Vacation rentals"],
            ['name' => "Beach hotels"],
            ['name' => "Ski resorts"],
            ['name' => "Casino hotels"],
            ['name' => "Golf resorts"],
            ['name' => "Health and wellness retreats"],
            ['name' => "Eco-friendly or sustainable hotels"],
            ['name' => "Historic hotels"],
            ['name' => "Conference or convention hotels"],
            ['name' => "Airport hotels"],
            ['name' => "Pet-friendly hotels"]
        ]);
    }
}
