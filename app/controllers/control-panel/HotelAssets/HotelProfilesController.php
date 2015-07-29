<?php

class HotelProfilesController extends \BaseController {

	/**
	 * Display a listing of hotelprofiles
	 *
	 * @return Response
	 */
	public function index()
	{
		$hotelprofile = Hotel::all();

		return View::make('control-panel.hotel.profile.profile', compact('hotelprofile'));
	}

	/**
	 * Show the form for creating a new hotelprofile
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('hotelprofiles.create');
	}

	/**
	 * Store a newly created hotelprofile in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$validator = Validator::make($data = Input::all(), Hotelprofile::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		Hotelprofile::create($data);

		return Redirect::route('hotelprofiles.index');
	}

	/**
	 * Display the specified hotelprofile.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$hotelprofile = Hotel::findOrFail($id);

		return View::make('hotelprofiles.show', compact('hotelprofile'));
	}

	/**
	 * Show the form for editing the specified hotelprofile.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$hotelprofile = Hotel::find($id);

        $hotelcategorieslist = HotelCategory::all();
        $hotelcategories = DB::table('hotel_hotel_category')->where('hotel_id',$id)->get(array('hotel_category_id'));
        $checkedhotelcategories = array();
        foreach($hotelcategories as $hotelcategory){
            $checkedhotelcategories[] =$hotelcategory->hotel_category_id;
        }

        $hotelfacilitieslist = HotelFacility::all();
        $hotelfacilities = DB::table('hotel_hotel_facility')->where('hotel_id',$id)->get(array('hotel_facility_id'));
        $checkedhotelfacilities = array();
        foreach($hotelfacilities as $hotelfacility){
            $checkedhotelfacilities[] = $hotelfacility->hotel_facility_id;
        }

        $hotelpolicies = CancellationPolicy::where('hotel_id', $id)->get();


        return View::make('control-panel.hotel.profile.profile')
            ->with(
                array(
                    'hotelprofile' => $hotelprofile,
                    'hotelcategorieslist'=>$hotelcategorieslist,
                    'checkedhotelcategories' => $checkedhotelcategories,
                    'hotelfacilitieslist' => $hotelfacilitieslist,
                    'checkedhotelfacilities' => $checkedhotelfacilities,
                    'hotelpolicies' => $hotelpolicies
                )
            );
	}

	/**
	 * Update the specified hotelprofile in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
    {

//        dd(Input::get('hotel_facility_id'));
        if ($hotelfacilties = Input::get('hotel_facility_id')){

            Session::put('manage', 'facilities');

            DB::table('hotel_hotel_facility')->where('hotel_id', $id)->delete();
            foreach ($hotelfacilties as $hotelfacility) {
                DB::table('hotel_hotel_facility')->insert(
                    array(
                        'hotel_facility_id' => $hotelfacility,
                        'hotel_id' => $id
                    )
                );
            }

            return Redirect::back()->with(
                array(
                    'successmessage' => 'successfully updated'
                )
            );

        }


        if (Input::has('update_location')) {
            Session::put('manage', 'location');
        }

		$hotelprofile = Hotel::findOrFail($id);

		$validator = Validator::make($data = Input::all(), Hotel::$updaterules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}


		if($hotelprofile->update($data)){

            if(Input::has('update_hotel')){
                Session::forget('manage');
                $hotelcategories = Input::get('category_id');
                DB::table('hotel_hotel_category')->where('hotel_id',$id)->delete();

                if(!empty($hotelcategories)){
                    foreach($hotelcategories as $hotelcategory){
                        DB::table('hotel_hotel_category')->insert(
                            array(
                                'hotel_id' => $id,
                                'hotel_category_id' => $hotelcategory
                            )
                        );
                    }
                }
            }

            if(Input::has('update_policies')){
                Session::put('manage', 'policies');
            }
        }


		return Redirect::back()->with(
            array(
                'successmessage' => 'successfully updated'
            )
        );
	}

	/**
	 * Remove the specified hotelprofile from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		Hotelprofile::destroy($id);

		return Redirect::route('hotelprofiles.index');
	}

}
