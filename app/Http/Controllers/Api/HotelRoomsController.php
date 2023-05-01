<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\RoomCollection;
use App\Http\Resources\RoomResource;
use App\Models\Hotel;
use Illuminate\Http\Request;

class HotelRoomsController extends Controller
{
    public function index(Request $request, Hotel $hotel): RoomCollection
    {
        $this->authorize('view', $hotel);

        $search = $request->get('search', '');

        $rooms = $hotel
            ->rooms()
            ->search($search)
            ->latest()
            ->paginate();

        return new RoomCollection($rooms);
    }

    public function store(Request $request, Hotel $hotel): RoomResource
    {
        $this->authorize('create', Room::class);

        $validated = $request->validate([
            'name' => ['required', 'max:255', 'string'],
            'count' => ['required', 'numeric'],
            'is_active' => ['required', 'boolean'],
            'description' => ['required', 'max:255', 'string'],
        ]);

        $room = $hotel->rooms()->create($validated);

        return new RoomResource($room);
    }
}
