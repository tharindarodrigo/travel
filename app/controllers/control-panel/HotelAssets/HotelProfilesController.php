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
//        dd(print_r($array));
        return View::make('control-panel.hotel.profile.profile')
            ->with(
                array(
                    'hotelprofile' => $hotelprofile,
                    'hotelcategorieslist'=>$hotelcategorieslist,
                    'checkedhotelcategories' => $checkedhotelcategories,
                    '$checkedhotelfacilities' => $hotelfacilitieslist,
                    'checkedhotelfacilities' => $checkedhotelfacilities
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
		$hotelprofile = Hotelprofile::findOrFail($id);

		$validator = Validator::make($data = Input::all(), Hotelprofile::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		$hotelprofile->update($data);

		return Redirect::route('hotelprofiles.index');
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
