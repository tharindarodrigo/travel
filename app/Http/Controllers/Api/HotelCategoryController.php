<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\HotelCategory;
use App\Http\Controllers\Controller;
use App\Http\Resources\HotelCategoryResource;
use App\Http\Resources\HotelCategoryCollection;
use App\Http\Requests\HotelCategoryStoreRequest;
use App\Http\Requests\HotelCategoryUpdateRequest;

class HotelCategoryController extends Controller
{
    public function index(Request $request): HotelCategoryCollection
    {
        $this->authorize('view-any', HotelCategory::class);

        $search = $request->get('search', '');

        $hotelCategories = HotelCategory::search($search)
            ->latest()
            ->paginate();

        return new HotelCategoryCollection($hotelCategories);
    }

    public function store(
        HotelCategoryStoreRequest $request
    ): HotelCategoryResource {
        $this->authorize('create', HotelCategory::class);

        $validated = $request->validated();

        $hotelCategory = HotelCategory::create($validated);

        return new HotelCategoryResource($hotelCategory);
    }

    public function show(
        Request $request,
        HotelCategory $hotelCategory
    ): HotelCategoryResource {
        $this->authorize('view', $hotelCategory);

        return new HotelCategoryResource($hotelCategory);
    }

    public function update(
        HotelCategoryUpdateRequest $request,
        HotelCategory $hotelCategory
    ): HotelCategoryResource {
        $this->authorize('update', $hotelCategory);

        $validated = $request->validated();

        $hotelCategory->update($validated);

        return new HotelCategoryResource($hotelCategory);
    }

    public function destroy(
        Request $request,
        HotelCategory $hotelCategory
    ): Response {
        $this->authorize('delete', $hotelCategory);

        $hotelCategory->delete();

        return response()->noContent();
    }
}
