<?php

namespace App\Http\Controllers;

use App\Models\Hotel;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\HotelStoreRequest;
use App\Http\Requests\HotelUpdateRequest;

class HotelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $this->authorize('view-any', Hotel::class);

        $search = $request->get('search', '');

        $hotels = Hotel::search($search)
            ->latest()
            ->paginate(5)
            ->withQueryString();

        return view('app.hotels.index', compact('hotels', 'search'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request): View
    {
        $this->authorize('create', Hotel::class);

        return view('app.hotels.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(HotelStoreRequest $request): RedirectResponse
    {
        $this->authorize('create', Hotel::class);

        $validated = $request->validated();

        $hotel = Hotel::create($validated);

        return redirect()
            ->route('hotels.edit', $hotel)
            ->withSuccess(__('crud.common.created'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request, Hotel $hotel): View
    {
        $this->authorize('view', $hotel);

        return view('app.hotels.show', compact('hotel'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request, Hotel $hotel): View
    {
        $this->authorize('update', $hotel);

        return view('app.hotels.edit', compact('hotel'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(
        HotelUpdateRequest $request,
        Hotel $hotel
    ): RedirectResponse {
        $this->authorize('update', $hotel);

        $validated = $request->validated();

        $hotel->update($validated);

        return redirect()
            ->route('hotels.edit', $hotel)
            ->withSuccess(__('crud.common.saved'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, Hotel $hotel): RedirectResponse
    {
        $this->authorize('delete', $hotel);

        $hotel->delete();

        return redirect()
            ->route('hotels.index')
            ->withSuccess(__('crud.common.removed'));
    }
}
