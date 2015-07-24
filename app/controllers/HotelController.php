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

    public function viewHotelList($country = '', $city_or_accommodation = '')
    {



        $x = 0;
        $path = array();
        $star_id = array();
        $facility_id = array();

        if (Input::has('star_rating')) {
            $star = Input::get('star_rating');
            $get_star_ids = StarCategory::whereIn('stars', $star)->select('id')->get();
            foreach ($get_star_ids as $get_star_id) {
                $star_id[] = $get_star_id->id;
            }
        } else {
            $get_star_ids = StarCategory::select('id')->get();
            foreach ($get_star_ids as $get_star_id) {
                $star_id[] = $get_star_id->id;
            }
        }

        if (Input::has('facility')) {
            $facility = Input::get('facility');
            $get_facility_ids = HotelFacility::whereIn('hotel_facility', $facility)->select('id')->get();
            foreach ($get_facility_ids as $get_facility_id) {
                $facility[] = $get_facility_id->id;
            }
        } else {
            $get_facility_ids = HotelFacility::select('id')->get();
            foreach ($get_facility_ids as $get_facility_id) {
                $facility[] = $get_facility_id->id;
            }
        }


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

            if (Input::has('accommodation')) {
                $get_accommodation = Input::get('accommodation');
                $accommodation = DB::table('hotel_categories')->where('id', '=', $get_accommodation)->first();
                $city_or_accommodation = $accommodation->hotel_category;
                $get_city_or_accommodation_id = DB::table('hotel_categories')->where('hotel_category', 'LIKE', $city_or_accommodation)->first();
            } else {
                $get_city_or_accommodation_id = DB::table('hotel_categories')->where('hotel_category', 'LIKE', $city_or_accommodation)->first();
            }

            if (!is_null($get_city_or_accommodation_id)) {
                $accommodation_id = $get_city_or_accommodation_id->id;

            } elseif (Input::has('city')) {

                $get_city = Input::get('city');
                $city = DB::table('cities')->where('id', '=', $get_city)->first();
                $city_or_accommodation = $city->city;
                $get_city_or_accommodation_id = DB::table('cities')->where('city', 'LIKE', $city_or_accommodation)->first();
                $city_id = $get_city_or_accommodation_id->id;

            } else {
                $get_city_or_accommodation_id = DB::table('cities')->where('city', 'LIKE', $city_or_accommodation)->first();
                $city_id = $get_city_or_accommodation_id->id;
            }
        }


        if (!empty($city_id)) {

            $hotels = Hotel::where('city_id', '=', $city_id)
                ->whereIn('star_category_id', $star_id)
                ->whereHas('HotelFacility',function($q) use($facility)
                {
                    $q->whereIn('hotel_facility_id', $facility);
                })
                ->paginate(6);

        }

        if (!empty($accommodation_id)) {
            $hotels = Hotel::whereHas('hotelCategory', function ($query) use ($accommodation_id, $star_id) {
                $query->where('hotel_category_id', '=', $accommodation_id);
                $query->whereIn('star_category_id', $star_id);

            })
                ->whereHas('HotelFacility',function($q) use($facility)
                {
                    $q->whereIn('hotel_facility_id', $facility);
                })
                ->paginate(6);

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

    public function hotelList($country = '', $city_or_accommodation = '')
    {
        try {

            $hotel_results = $this->viewHotelList($country, $city_or_accommodation);
            return View::make('hotel.hotel_list')
                ->with($hotel_results);
        } catch (Exception $e) {
            $no_result = $this->viewNoResult();
            return View::make('hotel.no_results')
                ->with($no_result);
        }
    }

    /*
     *no result page
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

    /*
     *no result page
     */
    public function viewSearch()
    {

        $get_city_or_accommodation = Input::get('txt-search');

        if (!empty($get_city_or_accommodation)) {

            $city_or_hotel = $get_city_or_accommodation;

            $get_city_or_hotel_id = DB::table('cities')->where('city', 'LIKE', $city_or_hotel)->first();

            if (!is_null($get_city_or_hotel_id)) {
                $city_id = $get_city_or_hotel_id->id;
                $city = str_replace(' ', '-', $get_city_or_accommodation);
                $url = 'sri-lanka/' . $city;
            } else {
                $get_city_or_hotel_id = DB::table('hotels')->where('name', 'LIKE', $city_or_hotel)->first();
                $hotel_id = $get_city_or_hotel_id->id;
                $hotel = str_replace(' ', '-', $get_city_or_accommodation);

                $city_id = $get_city_or_hotel_id->city_id;
                $get_city = DB::table('cities')->where('id', '=', $city_id)->first();
                $city_name = $get_city->city;
                $city = str_replace(' ', '-', $city_name);

                $url = 'sri-lanka/' . $city . '/' . $hotel;
                //dd($url);
            }
            return Redirect::to($url);
        } else {
            $no_result = $this->viewNoResult();
            return View::make('hotel.no_results')
                ->with($no_result);
        }

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
    public function hotelDetail($country = '', $city = '', $hotel_name)
    {


        // Filtering
        $hotel_type = DB::table('hotel_categories')->get();
        $hotel_cities = DB::table('cities')->get();
        $hotel_facilities = DB::table('hotel_facilities')->get();

        if (!empty($country)) {
            $country = str_replace('-', ' ', $country);
            $get_country_id = DB::table('countries')->where('country', 'LIKE', $country)->first();
            $country_id = $get_country_id->id;
        }

        if (!empty($city)) {
            $city = str_replace('-', ' ', $city);
            $city = DB::table('cities')->where('city', 'LIKE', $city)->first();
            $city_id = $city->id;

        }

        if (!empty($hotel_name)) {
            $hotel_name = str_replace('-', ' ', $hotel_name);
            $get_hotel_id = DB::table('hotels')->where('name', 'LIKE', $hotel_name)->first();
            $hotel_id = $get_hotel_id->id;
        }

        $path = array();

        $directory = 'images/hotel_images/';

        $images = glob($directory . $hotel_id . "_" . "*.*");

        foreach ($images as $image) {

            $path[] = $image;
        }

        $hotel = Hotel::where('id', '=', $hotel_id)->get();

        $rooms = RoomType::where('hotel_id', '=', $hotel_id)->get();


//        $room_facility = roomFacility::whereHas('Hotel', function ($query) use ($hotel_id) {
//            $query->where('hotel_id', '=', $hotel_id);
////            $query->where('room_type_id', '=', 6);
//        })
//            ->get();

//        dd(DB::getQueryLog());

        if (!$hotel->count()) {
            return Redirect::to('/403');
        }

        return View::make('hotel.hotel_details')
            ->with(
                array(

                    'hotel' => $hotel,
                    'hotel_id' => $hotel_id,
                    'hotel_type' => $hotel_type,
                    'hotel_cities' => $hotel_cities,
                    'hotel_facilities' => $hotel_facilities,
                    'path' => $path,
                    //'room_facility' => $room_facility,
                    'rooms' => $rooms,

                )
            );
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

    /* To Load The Map */

    public function getMap()
    {
        $hotel_id = Input::get('hotel_id');

        $hotel = Hotel::where('id', '=', $hotel_id)->select('latitude', 'longitude')->first();;

        return Response::json($hotel);

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

    /*
    *For the auto complete option
    */

    public function autoComplete()
    {

        if (isset($_POST['queryString'])) {

            $queryString = $_POST['queryString'];

            // Is the string length greater than 0?
            if (strlen($queryString) > 0) {

                $hotels = Hotel::where('name', 'LIKE', '%' . $queryString . '%')->get();
                $cities = City::where('city', 'LIKE', '%' . $queryString . '%')->get();

                //dd(DB::getQueryLog());

                if (!is_null($hotels)) {
                    if ($hotels) {
                        // While there are results loop through them - fetching an Object.

                        foreach ($hotels as $hotel) {

                            $directory = 'images/hotel_images/';
                            $images = glob($directory . $hotel->id . "_" . "*.*");
                            $img_path = array_shift($images);

                            echo '
                        <div class="auto_complete">
                            <a href="#" value="' . $hotel->name . '" category="hotel">

                             <span class="search_thumb">
                             <img class="search_thumb" src="../' . $img_path . '" alt="" />
                             </span>

                            <span class="category">' . $hotel->name . '
                            </span>

                            </a>
                            </div>';

                        }
                    }
                }

                if (!is_null($cities)) {
                    if ($cities) {
                        // While there are results loop through them - fetching an Object.

                        foreach ($cities as $city) {

                            $directory = 'images/hotel_images/';
                            $images = glob($directory . $city->id . "_" . "*.*");
                            $img_path = array_shift($images);

                            echo '
                        <div class="auto_complete">
                            <a href="#" value="' . $city->city . '" category="city">

                             <span class="search_thumb">
                             <img class="search_thumb" src="../' . $img_path . '" alt="" />
                             </span>

                            <span class="category">' . $city->city . '
                            </span>

                            </a>
                            </div>';

                        }

                    }
                }

            } else {
                echo 'Please Type Again To Start The Search';
            } // There is a queryString.
        } else {
            echo 'There should be no direct access to this script!';
        }

    }
}