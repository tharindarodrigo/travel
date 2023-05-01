<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\HotelAmenityCollection;
use App\Models\Hotel;
use App\Models\HotelAmenity;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class HotelHotelAmenitiesController extends Controller
{
    public function index(
        Request $request,
        Hotel $hotel
    ): HotelAmenityCollection {
        $this->authorize('view', $hotel);

        $search = $request->get('search', '');

        $hotelAmenities = $hotel
            ->hotelAmenities()
            ->search($search)
            ->latest()
            ->paginate();

        return new HotelAmenityCollection($hotelAmenities);
    }

    public function store(
        Request $request,
        Hotel $hotel,
        HotelAmenity $hotelAmenity
    ): Response {
        $this->authorize('update', $hotel);

        $hotel->hotelAmenities()->syncWithoutDetaching([$hotelAmenity->id]);

        return response()->noContent();
    }

    public function destroy(
        Request $request,
        Hotel $hotel,
        HotelAmenity $hotelAmenity
    ): Response {
        $this->authorize('update', $hotel);

        $hotel->hotelAmenities()->detach($hotelAmenity);

        return response()->noContent();
    }
}
