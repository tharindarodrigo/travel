<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\RoomStoreRequest;
use App\Http\Requests\RoomUpdateRequest;
use App\Http\Resources\RoomCollection;
use App\Http\Resources\RoomResource;
use App\Models\Room;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class RoomController extends Controller
{
    public function index(Request $request): RoomCollection
    {
        $this->authorize('view-any', Room::class);

        $search = $request->get('search', '');

        $rooms = Room::search($search)
            ->latest()
            ->paginate();

        return new RoomCollection($rooms);
    }

    public function store(RoomStoreRequest $request): RoomResource
    {
        $this->authorize('create', Room::class);

        $validated = $request->validated();

        $room = Room::create($validated);

        return new RoomResource($room);
    }

    public function show(Request $request, Room $room): RoomResource
    {
        $this->authorize('view', $room);

        return new RoomResource($room);
    }

    public function update(RoomUpdateRequest $request, Room $room): RoomResource
    {
        $this->authorize('update', $room);

        $validated = $request->validated();

        $room->update($validated);

        return new RoomResource($room);
    }

    public function destroy(Request $request, Room $room): Response
    {
        $this->authorize('delete', $room);

        $room->delete();

        return response()->noContent();
    }
}
