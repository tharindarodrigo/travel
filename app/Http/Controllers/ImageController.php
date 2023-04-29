<?php

namespace App\Http\Controllers;

use App\Models\Image;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\ImageStoreRequest;
use App\Http\Requests\ImageUpdateRequest;

class ImageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $this->authorize('view-any', Image::class);

        $search = $request->get('search', '');

        $images = Image::search($search)
            ->latest()
            ->paginate(5)
            ->withQueryString();

        return view('app.images.index', compact('images', 'search'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request): View
    {
        $this->authorize('create', Image::class);

        return view('app.images.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ImageStoreRequest $request): RedirectResponse
    {
        $this->authorize('create', Image::class);

        $validated = $request->validated();
        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('public');
        }

        $image = Image::create($validated);

        return redirect()
            ->route('images.edit', $image)
            ->withSuccess(__('crud.common.created'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request, Image $image): View
    {
        $this->authorize('view', $image);

        return view('app.images.show', compact('image'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request, Image $image): View
    {
        $this->authorize('update', $image);

        return view('app.images.edit', compact('image'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(
        ImageUpdateRequest $request,
        Image $image
    ): RedirectResponse {
        $this->authorize('update', $image);

        $validated = $request->validated();
        if ($request->hasFile('image')) {
            if ($image->image) {
                Storage::delete($image->image);
            }

            $validated['image'] = $request->file('image')->store('public');
        }

        $image->update($validated);

        return redirect()
            ->route('images.edit', $image)
            ->withSuccess(__('crud.common.saved'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, Image $image): RedirectResponse
    {
        $this->authorize('delete', $image);

        if ($image->image) {
            Storage::delete($image->image);
        }

        $image->delete();

        return redirect()
            ->route('images.index')
            ->withSuccess(__('crud.common.removed'));
    }
}
