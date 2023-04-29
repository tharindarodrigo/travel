<?php

namespace App\Http\Controllers\Api;

use App\Models\Room;
use Illuminate\Http\Request;
use App\Http\Resources\RateResource;
use App\Http\Controllers\Controller;
use App\Http\Resources\RateCollection;

class RoomRatesController extends Controller
{
    public function index(Request $request, Room $room): RateCollection
    {
        $this->authorize('view', $room);

        $search = $request->get('search', '');

        $rates = $room
            ->rates()
            ->search($search)
            ->latest()
            ->paginate();

        return new RateCollection($rates);
    }

    public function store(Request $request, Room $room): RateResource
    {
        $this->authorize('create', Rate::class);

        $validated = $request->validate([
            'adults' => ['required', 'max:255'],
            'children' => ['required', 'max:255'],
            'basis' => ['required', 'in:ro,bb,hb,fb,ai'],
            'from' => ['required', 'date'],
            'to' => ['required', 'date'],
            'price' => ['required', 'numeric'],
            'hotel_id' => ['required', 'exists:hotels,id'],
            'hotel_id' => ['required', 'exists:hotels,id'],
        ]);

        $rate = $room->rates()->create($validated);

        return new RateResource($rate);
    }
}
