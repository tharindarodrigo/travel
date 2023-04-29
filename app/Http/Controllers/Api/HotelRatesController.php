<?php

namespace App\Http\Controllers\Api;

use App\Models\Hotel;
use Illuminate\Http\Request;
use App\Http\Resources\RateResource;
use App\Http\Controllers\Controller;
use App\Http\Resources\RateCollection;

class HotelRatesController extends Controller
{
    public function index(Request $request, Hotel $hotel): RateCollection
    {
        $this->authorize('view', $hotel);

        $search = $request->get('search', '');

        $rates = $hotel
            ->rates()
            ->search($search)
            ->latest()
            ->paginate();

        return new RateCollection($rates);
    }

    public function store(Request $request, Hotel $hotel): RateResource
    {
        $this->authorize('create', Rate::class);

        $validated = $request->validate([
            'adults' => ['required', 'max:255'],
            'children' => ['required', 'max:255'],
            'basis' => ['required', 'in:ro,bb,hb,fb,ai'],
            'from' => ['required', 'date'],
            'to' => ['required', 'date'],
            'price' => ['required', 'numeric'],
        ]);

        $rate = $hotel->rates()->create($validated);

        return new RateResource($rate);
    }
}
