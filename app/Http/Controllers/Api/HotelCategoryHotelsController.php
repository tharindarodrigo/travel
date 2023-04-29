<?php
namespace App\Http\Controllers\Api;

use App\Models\Hotel;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\HotelCategory;
use App\Http\Controllers\Controller;
use App\Http\Resources\HotelCollection;

class HotelCategoryHotelsController extends Controller
{
    public function index(
        Request $request,
        HotelCategory $hotelCategory
    ): HotelCollection {
        $this->authorize('view', $hotelCategory);

        $search = $request->get('search', '');

        $hotels = $hotelCategory
            ->hotels()
            ->search($search)
            ->latest()
            ->paginate();

        return new HotelCollection($hotels);
    }

    public function store(
        Request $request,
        HotelCategory $hotelCategory,
        Hotel $hotel
    ): Response {
        $this->authorize('update', $hotelCategory);

        $hotelCategory->hotels()->syncWithoutDetaching([$hotel->id]);

        return response()->noContent();
    }

    public function destroy(
        Request $request,
        HotelCategory $hotelCategory,
        Hotel $hotel
    ): Response {
        $this->authorize('update', $hotelCategory);

        $hotelCategory->hotels()->detach($hotel);

        return response()->noContent();
    }
}
