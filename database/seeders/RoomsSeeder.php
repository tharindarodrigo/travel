<?php

namespace Database\Seeders;

use App\Models\Rooms;
use Illuminate\Database\Seeder;

class RoomsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Rooms::factory()
            ->count(5)
            ->create();
    }
}
