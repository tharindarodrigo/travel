<?php

namespace App\Http\Controllers;

use Illuminate\View\View;
use App\Models\HotelAmenity;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\HotelAmenityStoreRequest;
use App\Http\Requests\HotelAmenityUpdateRequest;

class HotelAmenityController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $this->authorize('view-any', HotelAmenity::class);

        $search = $request->get('search', '');

        $hotelAmenities = HotelAmenity::search($search)
            ->latest()
            ->paginate(5)
            ->withQueryString();

        return view(
            'app.hotel_amenities.index',
            compact('hotelAmenities', 'search')
        );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request): View
    {
        $this->authorize('create', HotelAmenity::class);

        return view('app.hotel_amenities.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(HotelAmenityStoreRequest $request): RedirectResponse
    {
        $this->authorize('create', HotelAmenity::class);

        $validated = $request->validated();

        $hotelAmenity = HotelAmenity::create($validated);

        return redirect()
            ->route('hotel-amenities.edit', $hotelAmenity)
            ->withSuccess(__('crud.common.created'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request, HotelAmenity $hotelAmenity): View
    {
        $this->authorize('view', $hotelAmenity);

        return view('app.hotel_amenities.show', compact('hotelAmenity'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request, HotelAmenity $hotelAmenity): View
    {
        $this->authorize('update', $hotelAmenity);

        return view('app.hotel_amenities.edit', compact('hotelAmenity'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(
        HotelAmenityUpdateRequest $request,
        HotelAmenity $hotelAmenity
    ): RedirectResponse {
        $this->authorize('update', $hotelAmenity);

        $validated = $request->validated();

        $hotelAmenity->update($validated);

        return redirect()
            ->route('hotel-amenities.edit', $hotelAmenity)
            ->withSuccess(__('crud.common.saved'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(
        Request $request,
        HotelAmenity $hotelAmenity
    ): RedirectResponse {
        $this->authorize('delete', $hotelAmenity);

        $hotelAmenity->delete();

        return redirect()
            ->route('hotel-amenities.index')
            ->withSuccess(__('crud.common.removed'));
    }
}
