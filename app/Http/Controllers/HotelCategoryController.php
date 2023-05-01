<?php

namespace App\Http\Controllers;

use App\Http\Requests\HotelCategoryStoreRequest;
use App\Http\Requests\HotelCategoryUpdateRequest;
use App\Models\HotelCategory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class HotelCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $this->authorize('view-any', HotelCategory::class);

        $search = $request->get('search', '');

        $hotelCategories = HotelCategory::search($search)
            ->latest()
            ->paginate(5)
            ->withQueryString();

        return view(
            'app.hotel_categories.index',
            compact('hotelCategories', 'search')
        );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request): View
    {
        $this->authorize('create', HotelCategory::class);

        return view('app.hotel_categories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(HotelCategoryStoreRequest $request): RedirectResponse
    {
        $this->authorize('create', HotelCategory::class);

        $validated = $request->validated();

        $hotelCategory = HotelCategory::create($validated);

        return redirect()
            ->route('hotel-categories.edit', $hotelCategory)
            ->withSuccess(__('crud.common.created'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request, HotelCategory $hotelCategory): View
    {
        $this->authorize('view', $hotelCategory);

        return view('app.hotel_categories.show', compact('hotelCategory'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request, HotelCategory $hotelCategory): View
    {
        $this->authorize('update', $hotelCategory);

        return view('app.hotel_categories.edit', compact('hotelCategory'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(
        HotelCategoryUpdateRequest $request,
        HotelCategory $hotelCategory
    ): RedirectResponse {
        $this->authorize('update', $hotelCategory);

        $validated = $request->validated();

        $hotelCategory->update($validated);

        return redirect()
            ->route('hotel-categories.edit', $hotelCategory)
            ->withSuccess(__('crud.common.saved'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(
        Request $request,
        HotelCategory $hotelCategory
    ): RedirectResponse {
        $this->authorize('delete', $hotelCategory);

        $hotelCategory->delete();

        return redirect()
            ->route('hotel-categories.index')
            ->withSuccess(__('crud.common.removed'));
    }
}
