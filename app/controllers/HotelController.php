<?php

class HotelController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */

	public function hotel_list()
	{
		return View::make('hotel.hotel_list');
	}

	public function listView($hotel_name = '', $hotel_category = '', $city_name = '')
	{
		Session::put('view_type','list');
		try{
			$hotel_results = $this->viewHotel($hotel_name, $hotel_category, $city_name);

			return View::make('hotel.hotel_list')
				->with($hotel_results);
		}catch(Exception $e){

			return View::make('hotel.no_results');
		}
	}

	public function gridView($hotel_name = '', $hotel_category = '', $city_name = '')
	{
		Session::put('view_type','grid');
		try{
			$hotel_results = $this->viewHotel($hotel_name, $hotel_category, $city_name);
			return View::make('property.property')
				->with($hotel_results);
		}catch(Exception $e){

			return View::make('property.no_results');

		}
	}

    public function index()
    {

        $hotel_name = Input::get('type') . '/';

        $hotel_category = Input::get('status') . '/';

        if (Input::get('city') == '%') {
            $city_name = '';
        } else {
            $city_name = Input::get('city') . '/';

        }


        $route = '/property/' . $hotel_name . $hotel_category . $city_name;
        if(Session::get('view_type')=='list'){
            $route = '/property/list/' . $hotel_name . $hotel_category . $city_name;
        }


//        return View::make('property.property')
//            ->with($this->viewProperty($hotel_name, $category_id, $city_id, $area_id));

        return Redirect::to($route);
    }

    public function viewHotel($hotel_name = '', $hotel_category = '', $city_name = '')
    {

        $hotel_url = $hotel_name ;
        $category_url = $hotel_category ;
        $city_url = $city_name;

        $page_title ='';

        if($hotel_url !=''){
            $hotel_url.='/';
            $page_title.=$hotel_name;

        }
        if($category_url !=''){
            $category_url.='/';
            $page_title.=' for '.$hotel_category;

        }
        if($city_url !=''){
            $city_url.='/';
            $page_title.=' in '.$city_name;

        }

        $list_url = '/hotel/list/' . $hotel_url . $category_url . $city_url;
        $grid_url = '/hotel/' . $hotel_url . $category_url . $city_url;


        $path = array();

        if (empty($hotel_name)) {
            $hotel_id = '%';
        } else {
            $get_hotel_id = DB::table('property_type')->where('name', 'LIKE', $hotel_name)->first();
            if (!empty($get_type_id)) {
                $hotel_id = $get_type_id->id;
            } else {
                $hotel_id = 0;
            }
        }

        if (empty($hotel_category)) {
            $category_id = '%';
        } else {
            $get_status_id = DB::table('property_status')->where('name', 'LIKE', $hotel_category)->first();
            empty($get_status_id) ? $category_id = 0 : $category_id = $get_status_id->id;

        }

        if (empty($city_name)) {
            $city_id = '%';
        } elseif (!empty($city_name)) {
            $city_name = str_replace('-', ' ', $city_name);
            $get_city_id = DB::table('cities')->where('city_name', 'LIKE', $city_name)->first();
            empty($get_city_id) ? $city_id = 0 : $city_id = $get_city_id->id;

        }


        $attributes = Session::pull('attributes');


        /*-----------     Property Details     ------------*/


        //$Property_details = DB::table('ad')->where('id', '=', $id)->first();

        $hotels = Hotel::all();

        if (!$hotels->count()) {
            return Redirect::to('/403');
        }
        return
            array(

                'path' => $path,
                'type_id' => $hotel_id,
                'status_id' => $category_id,
                'hotels' => $hotels,
                'grid_url' => $grid_url,
                'list_url' => $list_url,
                'page_title' => $page_title

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
	 * @param  int  $id
	 * @return Response
	 */
	public function hotelDetail($id)
	{
		return View::make('hotel.hotel_details');
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}


}
