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

    public function listView($hotel_category = '', $status_id = '', $city_id = '')
    {
        Session::put('view_type', 'list');
        try {
            $hotel_results = $this->viewProperty($hotel_category, $status_id, $city_id);

            return View::make('hotel.hotel_list')
                ->with($hotel_results);
        } catch (Exception $e) {

            return View::make('hotel.no_results');
        }
    }

    public function gridView($hotel_category = '', $status_id = '', $city_id = '')
    {
        Session::put('view_type', 'grid');
        try {
            $hotel_results = $this->viewProperty($hotel_category, $status_id, $city_id);
            return View::make('hotel.hotel_grid')
                ->with($hotel_results);
        } catch (Exception $e) {

            return View::make('hotel.no_results');

        }
    }

    public function viewProperty($hotel_category = '', $hotel_name = '', $city_name = '')
    {

        $type_url = $hotel_category;
        $status_url = $hotel_name;
        $city_url = $city_name;

        $page_title = '';

        if ($type_url != '') {
            $type_url .= '/';
            $page_title .= $hotel_category;

        }
        if ($status_url != '') {
            $status_url .= '/';
            $page_title .= ' for ' . $hotel_name;

        }
        if ($city_url != '') {
            $city_url .= '/';
            $page_title .= ' in ' . $city_name;

        }


        $list_url = '/property/list/' . $type_url . $status_url . $city_url;
        $grid_url = '/property/' . $type_url . $status_url . $city_url;


        $path = array();

        if (empty($hotel_category)) {
            $type_id = '%';
        } else {
            $get_type_id = DB::table('property_type')->where('name', 'LIKE', $hotel_category)->first();
            if (!empty($get_type_id)) {
                $type_id = $get_type_id->id;
            } else {
                $type_id = 0;
            }
        }


        $attributes = Session::pull('attributes');

        $beds = $attributes['beds'];
        $bath = $attributes['bath'];
        $min = $attributes['min'];
        $max = $attributes['max'];


        if (!is_numeric($beds)) {
            $beds = 0;
        }


        /*-----------     Hotel Details     ------------*/

        $hotel = DB::table('ad')
            ->select(
                'users.id as user_id', 'users.first_name', 'users.last_name', 'users.email', 'users.address', 'users.phone',
                'cities.id as city_id', 'cities.city_name',
                'area.id as area_id', 'area.area_name',
                'property_type.id as property_type_id', 'property_type.name as property_type_name',
                'property_status.id as property_status_id', 'property_status.name as property_status_name',
                'ad.id as ad_id', 'ad.title', 'ad.description', 'ad.bedrooms', 'ad.bathrooms', 'ad.parking', 'ad.land_size', 'ad.house_size', 'ad.price', 'ad.key_money', 'ad.negotiable', 'ad.val'
            )
            ->join('users', 'users.id', '=', 'ad.users_id')
            ->join('cities', 'cities.id', '=', 'ad.cities_id')
            ->join('area', 'area.id', '=', 'ad.area_id')
            ->join('property_type', 'property_type.id', '=', 'ad.property_type_id')
            ->join('property_status', 'property_status.id', '=', 'ad.property_status_id')
            ->where('ad.property_type_id', 'LIKE', $type_id)
            ->where('ad.property_status_id', 'LIKE', $status_id)
            ->where('ad.cities_id', 'LIKE', $city_id)
            ->where('ad.bedrooms', '>=', $beds)
            ->where('ad.bathrooms', '>=', $bath)
            ->where('ad.price', '>', $min)
            ->where('ad.price', '<', $max)
            ->where('expiry_date', '>=', date('Y-m-d'))
            ->paginate(12);


        if (!$hotel->count()) {
            return Redirect::to('/403');
        }
        return
            array(

                'path' => $path,
                'hotel' => $hotel
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
