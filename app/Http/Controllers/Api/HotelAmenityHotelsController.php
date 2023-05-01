<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\HotelCollection;
use App\Models\Hotel;
use App\Models\HotelAmenity;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class HotelAmenityHotelsController extends Controller
{
    public function index(
        Request $request,
        HotelAmenity $hotelAmenity
    ): HotelCollection {
        $this->authorize('view', $hotelAmenity);

        $search = $request->get('search', '');

        $hotels = $hotelAmenity
            ->hotels()
            ->search($search)
            ->latest()
            ->paginate();

        return new HotelCollection($hotels);
    }

    public function store(
        Request $request,
        HotelAmenity $hotelAmenity,
        Hotel $hotel
    ): Response {
        $this->authorize('update', $hotelAmenity);

        $hotelAmenity->hotels()->syncWithoutDetaching([$hotel->id]);

        return response()->noContent();
    }

    public function destroy(
        Request $request,
        HotelAmenity $hotelAmenity,
        Hotel $hotel
    ): Response {
        $this->authorize('update', $hotelAmenity);

        $hotelAmenity->hotels()->detach($hotel);

        return response()->noContent();
    }
}
