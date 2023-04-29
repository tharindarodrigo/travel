<?php

namespace App\Http\Controllers\Api;

use App\Models\HotelAmenity;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use App\Http\Resources\HotelAmenityResource;
use App\Http\Resources\HotelAmenityCollection;
use App\Http\Requests\HotelAmenityStoreRequest;
use App\Http\Requests\HotelAmenityUpdateRequest;

class HotelAmenityController extends Controller
{
    public function index(Request $request): HotelAmenityCollection
    {
        $this->authorize('view-any', HotelAmenity::class);

        $search = $request->get('search', '');

        $hotelAmenities = HotelAmenity::search($search)
            ->latest()
            ->paginate();

        return new HotelAmenityCollection($hotelAmenities);
    }

    public function store(
        HotelAmenityStoreRequest $request
    ): HotelAmenityResource {
        $this->authorize('create', HotelAmenity::class);

        $validated = $request->validated();

        $hotelAmenity = HotelAmenity::create($validated);

        return new HotelAmenityResource($hotelAmenity);
    }

    public function show(
        Request $request,
        HotelAmenity $hotelAmenity
    ): HotelAmenityResource {
        $this->authorize('view', $hotelAmenity);

        return new HotelAmenityResource($hotelAmenity);
    }

    public function update(
        HotelAmenityUpdateRequest $request,
        HotelAmenity $hotelAmenity
    ): HotelAmenityResource {
        $this->authorize('update', $hotelAmenity);

        $validated = $request->validated();

        $hotelAmenity->update($validated);

        return new HotelAmenityResource($hotelAmenity);
    }

    public function destroy(
        Request $request,
        HotelAmenity $hotelAmenity
    ): Response {
        $this->authorize('delete', $hotelAmenity);

        $hotelAmenity->delete();

        return response()->noContent();
    }
}
