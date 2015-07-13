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

    public function listView($hotel_category = '', $city_name = '', $chk_in = '', $chk_out = '', $min_price = '', $max_price = '', $adult = '', $child = '', $star = '', $facilities = '')
    {
        Session::put('view_type', 'list');
        try {
            $hotel_results = $this->viewHotel($hotel_category, $city_name, $chk_in, $chk_out, $min_price, $max_price, $adult, $child, $star, $facilities);

            return View::make('hotel.hotel_list')
                ->with($hotel_results);
        } catch (Exception $e) {

            return View::make('hotel.no_results');
        }
    }

    public function gridView($hotel_category = '', $city_name = '', $chk_in = '', $chk_out = '', $min_price = '', $max_price = '', $adult = '', $child = '', $star = '', $facilities = '')
    {
        Session::put('view_type', 'grid');
        try {
            $hotel_results = $this->viewHotel($hotel_category, $city_name, $chk_in, $chk_out, $min_price, $max_price, $adult, $child, $star, $facilities);
            return View::make('property.property')
                ->with($hotel_results);
        } catch (Exception $e) {

            return View::make('property.no_results');

        }
    }

    public function index()
    {
        if (Request::segment(1) == 'accommodation') {
            $hotel_category = Request::segment(2) . '/';
            $route = '/accommodation/' . $hotel_category;
            if (Session::get('view_type') == 'grid') {
                $route = '/accommodation/grid/' . $hotel_category;
            }
        } elseif (Request::segment(1) == 'city') {
            $city = Request::segment(2) . '/';
            $route = '/city/' . $city;
            if (Session::get('view_type') == 'grid') {
                $route = '/city/grid/' . $city;
            }
        } else {
            return View::make('hotel.no_results');
        }

        return Redirect::to($route);
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

    public function viewHotel($hotel_category = '', $city_name = '', $chk_in = '', $chk_out = '', $min_price = '', $max_price = '', $adult = '', $child = '', $star = '', $facilities = '')
    {

        // Filtering

        $hotel_type = DB::table('hotel_categories')->get();
        $hotel_cities = DB::table('cities')->get();
        $hotel_facilities = DB::table('hotel_facilities')->get();



        $category_url = $hotel_category;
        $city_url = $city_name;

        $page_title = '';

        if ($category_url != '') {
            $category_url .= '/';
            $page_title .= ' for ' . $hotel_category;
        }

        if ($city_url != '') {
            $city_url .= '/';
            $page_title .= ' in ' . $city_name;
        }

        if (!empty($hotel_category)) {
            $list_url = '/hotel/' . $category_url;
            $grid_url = '/hotel/grid/' . $category_url;
        } else {
            $list_url = '/hotel/' . $city_url;
            $grid_url = '/hotel/grid/' . $city_url;
        }

        $path = array();

        if (!empty($hotel_category)) {
            $hotel_category = str_replace('-', ' ', $hotel_category);
            $get_category_id = DB::table('hotel_categories')->where('hotel_category', 'LIKE', $hotel_category)->first();
            $category_id = $get_category_id->id;
        }

        if (!empty($city_name)) {
            $city_name = str_replace('-', ' ', $city_name);
            $get_city_id = DB::table('cities')->where('city', 'LIKE', $city_name)->first();
            $city_id = $get_city_id->id;
        }

        $hotels = Hotel::paginate(5);

        if (!$hotels->count()) {
            return Redirect::to('/403');
        }

        return
            array(

                'path' => $path,
                'category_id' => $category_id,
                'hotels' => $hotels,
                'grid_url' => $grid_url,
                'list_url' => $list_url,
                'page_title' => $page_title,
                'hotel_type' => $hotel_type,
                'hotel_cities' => $hotel_cities,
                'hotel_facilities' => $hotel_facilities

            );

    }

    public function viewSearch($city_name = '', $chk_in = '', $chk_out = '', $adult = '', $child = '')
    {
        try {
            $hotel_results = $this->viewHotel($city_name, $chk_in, $chk_out, $adult, $child);

            return View::make('hotel.hotel_list')
                ->with($hotel_results);
        } catch (Exception $e) {
            return View::make('hotel.no_results');
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
