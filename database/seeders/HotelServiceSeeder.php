<?php

namespace Database\Seeders;

use App\Models\Hotel;
use App\Models\HotelService;
use Illuminate\Database\Seeder;
use mysql_xdevapi\Collection;

class HotelServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        Hotel::query()->each(function(Hotel $hotel) {
            $hotel->hotelServices()->saveMany(
                HotelService::factory(['hotel_id'=> $hotel->id])
                    ->count(5)->make()
            );
        });
    }
}
