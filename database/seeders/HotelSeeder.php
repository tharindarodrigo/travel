<?php

namespace Database\Seeders;

use App\Models\Hotel;
use App\Models\HotelAmenity;
use App\Models\HotelCategory;
use App\Models\HotelService;
use Illuminate\Database\Seeder;

class HotelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //Generate a unique list of hotel names like Avenra, Cinnamon, Jetwing, etc. Doesn't have to be real hotel names.
        $hotelNames = [
            'Avenra',
            'Amaya',
            'Anantara',
            'Araliya',
            'Arie Lagoon',
            'Ayana',
            'Bandarawela',
            'Bar Reef',
            'Beach',
            'Berjaya',
            'Blue Waters',
            'Cantaloupe',
            'Casa Colombo',
            'Cinnamon',
            'Citrus',
            'Club',
            'Club Palm Bay',
            'Club Waskaduwa',
            'Coral Rock',
            'Coral Sands',
            'Coral',
            'Cove',
            'Crescent',
            'Earl\'s Regency',
            'Eden',
            'Ella',
            'Ellaidhoo',
            'Emerald Bay',
            'Fairway',
            'Fortress',
            'Galadari',
            'Galle Face',
            'Galle Heritage',
            'Galle',
            'Grand',
            'Grand Udawalawe',
            'Grand Kandyan',
            'Grand Oriental',
            'Grand Tamarind',
            'Habarana',
            'Hemas',
            'Heritance',
            'Heritance Negombo',
            'Heritance Tea Factory',
            'Hikka Tranz',
            'Hilton',
            'Hilton Colombo',
            'Hilton Residences',
            'Hilton Yala',
            'Hunas Falls',
            'Jetwing',
            'Jetwing Ayurveda Pavilions',
            'Jetwing Beach',
            'Jetwing Blue',
            'Jetwing Colombo Seven',
            'Jetwing Kaduruketha',
            'Jetwing Kurulubedda',
            'Jetwing Lagoon',
            'Jetwing Lake',
            'Jetwing Lighthouse',
            'Jetwing Sea',
            'Jetwing Surf',
            'Jetwing Vil Uyana',
            'Jetwing Warwick Gardens',
            'Kandy',
            'Koggala Beach',
            'Koggala',
        ];

        foreach ($hotelNames as $hotelName) {
            Hotel::factory()->create([
                'name' => $hotelName,
            ]);
        }

        Hotel::all()->each(function (Hotel $hotel) {
            $hotel->hotelAmenities()->saveMany(
                HotelAmenity::inRandomOrder()->limit(5)->get()
            );

            $hotel->hotelCategories()->saveMany(
                HotelCategory::inRandomOrder()->limit(5)->get()
            );

            HotelService::factory(['hotel_id' => $hotel->id])->count(5)->make();
        });
    }
}
