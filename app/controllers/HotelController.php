<?php

class HotelController extends \BaseController
{

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */

    public function hotel_list()
    {
        return View::make('hotel.hotel_list');
    }

    public function listView($hotel_category = '', $city_or_accommodation = '', $chk_in = '', $chk_out = '', $min_price = '', $max_price = '', $adult = '', $child = '', $star = '', $facilities = '')
    {
        Session::put('view_type', 'list');
        try {
            $hotel_results = $this->viewHotel($hotel_category, $city_or_accommodation, $chk_in, $chk_out, $min_price, $max_price, $adult, $child, $star, $facilities);

            return View::make('hotel.hotel_list')
                ->with($hotel_results);
        } catch (Exception $e) {

            return View::make('hotel.no_results');
        }
    }

    public function gridView($hotel_category = '', $city_or_accommodation = '', $chk_in = '', $chk_out = '', $min_price = '', $max_price = '', $adult = '', $child = '', $star = '', $facilities = '')
    {
        Session::put('view_type', 'grid');
        try {
            $hotel_results = $this->viewHotel($hotel_category, $city_or_accommodation, $chk_in, $chk_out, $min_price, $max_price, $adult, $child, $star, $facilities);
            return View::make('property.property')
                ->with($hotel_results);
        } catch (Exception $e) {

            return View::make('property.no_results');

        }
    }

    public function viewAccommodation($hotel_category = '')
    {
        try {
            $hotel_results = $this->viewHotel($hotel_category);

            return View::make('hotel.hotel_list')
                ->with($hotel_results);
        } catch (Exception $e) {
            return View::make('hotel.no_results');
        }
    }


    /*
     Hotel list page
    */

    public function viewHotel($country = '', $city_or_accommodation = '', $hotel_name = '')
    {

        $path = array();

        // Filtering
        $hotel_type = DB::table('hotel_categories')->get();
        $hotel_cities = DB::table('cities')->get();
        $hotel_facilities = DB::table('hotel_facilities')->get();


        if (!empty($country)) {
            $country = str_replace('-', ' ', $country);
            $get_country_id = DB::table('countries')->where('country', 'LIKE', $country)->first();
            $country_id = $get_country_id->id;
        }

        if (!empty($city_or_accommodation)) {
            $city_or_accommodation = str_replace('-', ' ', $city_or_accommodation);
            $get_city_or_accommodation_id = DB::table('hotel_categories')->where('hotel_category', 'LIKE', $city_or_accommodation)->first();

            if (!is_null($get_city_or_accommodation_id)) {
                $accommodation_id = $get_city_or_accommodation_id->id;
            } else {

                $get_city_or_accommodation_id = DB::table('cities')->where('city', 'LIKE', $city_or_accommodation)->first();
                $city_id = $get_city_or_accommodation_id->id;
            }
        }


        if (!empty($hotel_name)) {
            $hotel_name = str_replace('-', ' ', $hotel_name);
            $get_hotel_id = DB::table('hotels')->where('name', 'LIKE', $hotel_name)->first();
            $hotel_id = $get_hotel_id->id;
        }


        $country_url = $country;
        $city_or_accommodation_url = $city_or_accommodation;
        $hotel_name_url = $hotel_name;

        $page_title = '';

        if ($country_url != '') {
            $country_url .= '/';
            $page_title .= ' for ' . $country;
        }

        if ($city_or_accommodation_url != '') {
            $city_or_accommodation_url .= '/';
            $page_title .= ' in ' . $city_or_accommodation;
        }

        if ($hotel_name_url != '') {
            $hotel_name_url .= '/';
            $page_title .= ' in ' . $hotel_name;
        }

//        if (!empty($hotel_category)) {
//            $list_url = '/hotel/' . $category_url;
//            $grid_url = '/hotel/grid/' . $category_url;
//        }
//
//        if (!empty($city_or_accommodation)){
//            $list_url = '/hotel/' . $city_or_accommodation_url;
//            $grid_url = '/hotel/grid/' . $city_or_accommodation_url;
//        }

        if (!empty($city_id)) {
            $hotels = Hotel::where('city_id', '=', $city_id)->paginate(5);
        }

        if (!empty($accommodation_id)) {
            $hotels = Hotel::whereHas('hotelCategory', function ($query) use ($accommodation_id) {
                $query->where('hotel_category_id', '=', $accommodation_id);
            })
                ->paginate(5);

            // dd(DB::getQueryLog());
            // $hotels = Hotel::with('hotelCategory')->where('hotel_category_id', '=', $accommodation_id)->paginate(1);

        }

        if (!$hotels->count()) {
            return Redirect::to('/403');
        }


        return
            array(

                'hotels' => $hotels,
                'hotel_type' => $hotel_type,
                'hotel_cities' => $hotel_cities,
                'hotel_facilities' => $hotel_facilities

            );

    }


    /*
     Hotel list page redirect page
    */

    public function viewSearch($country = '', $city_or_accommodation = '', $hotel_name = '')
    {
        try {
            $hotel_results = $this->viewHotel($country, $city_or_accommodation, $hotel_name);

            return View::make('hotel.hotel_list')
                ->with($hotel_results);
        } catch (Exception $e) {
            $no_result = $this->viewNoResult();
            return View::make('hotel.no_results')
                ->with($no_result);;
        }
    }

    /*
     no result page
    */
    public function viewNoResult()
    {
        // Filtering
        $hotel_type = DB::table('hotel_categories')->get();
        $hotel_cities = DB::table('cities')->get();
        $hotel_facilities = DB::table('hotel_facilities')->get();

        return
            array(
                'hotel_type' => $hotel_type,
                'hotel_cities' => $hotel_cities,
                'hotel_facilities' => $hotel_facilities
            );
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
    }


    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store()
    {
        //
    }


    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function hotelDetail($id)
    {
        return View::make('hotel.hotel_details');
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  int $id
     * @return Response
     */
    public function update($id)
    {
        //
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }


}
