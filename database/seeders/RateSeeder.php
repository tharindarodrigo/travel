<?php

namespace Database\Seeders;

use App\Models\Hotel;
use App\Models\Rate;
use App\Models\Room;
use Illuminate\Database\Seeder;

class RateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Hotel::all()->each(function (Hotel $hotel) {
            $hotel->rooms()->each(function (Room $room) {
                $room->rates()->saveMany(
                    Rate::factory([
                        'hotel_id' => $room->hotel_id,
                        'room_id' => $room->id,
                    ])->count(5)->make()
                );
            });
        });
    }
}
