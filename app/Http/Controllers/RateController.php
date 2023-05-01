<?php

namespace App\Http\Controllers;

use App\Http\Requests\RateStoreRequest;
use App\Http\Requests\RateUpdateRequest;
use App\Models\Hotel;
use App\Models\Rate;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class RateController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $this->authorize('view-any', Rate::class);

        $search = $request->get('search', '');

        $rates = Rate::search($search)
            ->latest()
            ->paginate(5)
            ->withQueryString();

        return view('app.rates.index', compact('rates', 'search'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request): View
    {
        $this->authorize('create', Rate::class);

        $hotels = Hotel::pluck('name', 'id');

        return view('app.rates.create', compact('hotels', 'hotels'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(RateStoreRequest $request): RedirectResponse
    {
        $this->authorize('create', Rate::class);

        $validated = $request->validated();

        $rate = Rate::create($validated);

        return redirect()
            ->route('rates.edit', $rate)
            ->withSuccess(__('crud.common.created'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request, Rate $rate): View
    {
        $this->authorize('view', $rate);

        return view('app.rates.show', compact('rate'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request, Rate $rate): View
    {
        $this->authorize('update', $rate);

        $hotels = Hotel::pluck('name', 'id');

        return view('app.rates.edit', compact('rate', 'hotels', 'hotels'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(
        RateUpdateRequest $request,
        Rate $rate
    ): RedirectResponse {
        $this->authorize('update', $rate);

        $validated = $request->validated();

        $rate->update($validated);

        return redirect()
            ->route('rates.edit', $rate)
            ->withSuccess(__('crud.common.saved'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, Rate $rate): RedirectResponse
    {
        $this->authorize('delete', $rate);

        $rate->delete();

        return redirect()
            ->route('rates.index')
            ->withSuccess(__('crud.common.removed'));
    }
}
