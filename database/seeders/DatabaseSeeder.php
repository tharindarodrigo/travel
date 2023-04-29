<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Adding an admin user
        $user = \App\Models\User::factory()
            ->count(1)
            ->create([
                'email' => 'admin@admin.com',
                'password' => \Hash::make('admin'),
            ]);

        $this->call(HotelSeeder::class);
        $this->call(HotelAmenitySeeder::class);
        $this->call(HotelCategorySeeder::class);
        $this->call(HotelServiceSeeder::class);
        $this->call(ImageSeeder::class);
        $this->call(RateSeeder::class);
        $this->call(RoomSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(VehicleSeeder::class);
    }
}