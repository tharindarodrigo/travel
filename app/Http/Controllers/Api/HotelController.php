<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\HotelStoreRequest;
use App\Http\Requests\HotelUpdateRequest;
use App\Http\Resources\HotelCollection;
use App\Http\Resources\HotelResource;
use App\Models\Hotel;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class HotelController extends Controller
{
    public function index(Request $request): HotelCollection
    {
        $this->authorize('view-any', Hotel::class);

        $search = $request->get('search', '');

        $hotels = Hotel::search($search)
            ->latest()
            ->paginate();

        return new HotelCollection($hotels);
    }

    public function store(HotelStoreRequest $request): HotelResource
    {
        $this->authorize('create', Hotel::class);

        $validated = $request->validated();

        $hotel = Hotel::create($validated);

        return new HotelResource($hotel);
    }

    public function show(Request $request, Hotel $hotel): HotelResource
    {
        $this->authorize('view', $hotel);

        return new HotelResource($hotel);
    }

    public function update(
        HotelUpdateRequest $request,
        Hotel $hotel
    ): HotelResource {
        $this->authorize('update', $hotel);

        $validated = $request->validated();

        $hotel->update($validated);

        return new HotelResource($hotel);
    }

    public function destroy(Request $request, Hotel $hotel): Response
    {
        $this->authorize('delete', $hotel);

        $hotel->delete();

        return response()->noContent();
    }
}
