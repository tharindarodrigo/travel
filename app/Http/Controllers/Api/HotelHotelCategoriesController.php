<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\HotelCategoryCollection;
use App\Models\Hotel;
use App\Models\HotelCategory;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class HotelHotelCategoriesController extends Controller
{
    public function index(
        Request $request,
        Hotel $hotel
    ): HotelCategoryCollection {
        $this->authorize('view', $hotel);

        $search = $request->get('search', '');

        $hotelCategories = $hotel
            ->hotelCategories()
            ->search($search)
            ->latest()
            ->paginate();

        return new HotelCategoryCollection($hotelCategories);
    }

    public function store(
        Request $request,
        Hotel $hotel,
        HotelCategory $hotelCategory
    ): Response {
        $this->authorize('update', $hotel);

        $hotel->hotelCategories()->syncWithoutDetaching([$hotelCategory->id]);

        return response()->noContent();
    }

    public function destroy(
        Request $request,
        Hotel $hotel,
        HotelCategory $hotelCategory
    ): Response {
        $this->authorize('update', $hotel);

        $hotel->hotelCategories()->detach($hotelCategory);

        return response()->noContent();
    }
}
