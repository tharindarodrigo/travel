<?php

namespace Database\Seeders;

use App\Models\Hotel;
use App\Models\Room;
use Illuminate\Database\Seeder;

class RoomSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Hotel::all()->each(function (Hotel $hotel) {
            $hotel->rooms()->saveMany(
                Room::factory(['hotel_id' => $hotel->id])
                    ->count(5)->make()
            );
        });
    }
}
