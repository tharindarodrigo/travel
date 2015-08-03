<?php

class HotelsController extends \BaseController
{

    /**
     * Display a listing of hotels
     *
     * @return Response
     */
    public function index()
    {
        $hotels = Hotel::all();

        return View::make('control-panel.hotel.hotels.index', compact('hotels'));
    }

    /**
     * Show the form for creating a new hotel
     *
     * @return Response
     */
    public function create()
    {
        $hotelcategorieslist = HotelCategory::all();
        $hotelcategories = HotelCategory::all();
        $hotelfacilitieslist = HotelFacility::all();
        $checkedhotelfacilities = array();
        $checkedhotelcategories = array();

        return View::make('control-panel.hotel.hotels.create', compact('hotelcategories', 'hotelcategorieslist', 'checkedhotelcategories', 'hotelfacilitieslist', 'checkedhotelfacilities'));
    }

    /**
     * Store a newly created hotel in storage.
     *
     * @return Response
     */
    public function store()
    {
//        dd(Input::get('images'));
        $validator = Validator::make($data = Input::all(), Hotel::$rules);

        if ($validator->fails()) {
            dd($validator->errors());
            return Redirect::back()->withErrors($validator)->withInput();
        }
//        dd($data);

        $data['users_id'] = Auth::user()->id;

        if ($hotel = Hotel::create($data)) {


            if (Input::hasFile('images')) {

                $files = Input::file('images');

                $x=0;

                foreach($files as $file){
                    Image::make($file)
                        ->encode('jpg')
                        ->save('public/control-panel-assets/images/hotel-images/' . $hotel->id . '_' . ++$x . '.jpg');
                }
            }


        }


        $categories = Input::get('category_id');
        foreach ($categories as $category_id) {

            // Enter data into pivot table
            $hotel_hotel_category_data = array(
                'hotel_id' => $hotel->id,
                'hotel_category_id' => $category_id
            );
            DB::table('hotel_hotel_category')->insert($hotel_hotel_category_data);
        }


        $facilities = Input::get('hotel_facility_id');

        foreach ($facilities as $facility_id) {

            // Enter data into pivot table
            $hotel_hotel_facility_data = array(
                'hotel_id' => $hotel->id,
                'hotel_facility_id' => $facility_id
            );
            DB::table('hotel_hotel_facility')->insert($hotel_hotel_facility_data);
        }

        return Redirect::route('control-panel.hotel.hotels.index');
    }

    /**
     * Display the specified hotel.
     *
     * @param  int $id
     * @return Response
     */
    public function show($id)
    {
        $hotel = Hotel::findOrFail($id);

        return View::make('hotels.show', compact('hotel'));
    }

    /**
     * Show the form for editing the specified hotel.
     *
     * @param  int $id
     * @return Response
     */
    public function edit($id)
    {
        $hotelprofile = Hotel::find($id);
        $hotelImages = array();
        $hotelimages = File::glob('public/control-panel-assets/images/hotel-images/'.$hotelprofile->id.'_*');
        foreach($hotelimages as $hotelimage){
            $hotelImages[] = basename($hotelimage);
        }

        $hotelcategorieslist = HotelCategory::all();
        $hotelcategories = DB::table('hotel_hotel_category')->where('hotel_id', $id)->get(array('hotel_category_id'));
        $checkedhotelcategories = array();
        foreach ($hotelcategories as $hotelcategory) {
            $checkedhotelcategories[] = $hotelcategory->hotel_category_id;
        }

        $hotelfacilitieslist = HotelFacility::all();
        $hotelfacilities = DB::table('hotel_hotel_facility')->where('hotel_id', $id)->get(array('hotel_facility_id'));
        $checkedhotelfacilities = array();
        foreach ($hotelfacilities as $hotelfacility) {
            $checkedhotelfacilities[] = $hotelfacility->hotel_facility_id;
        }

        $hotelpolicies = CancellationPolicy::where('hotel_id', $id)->get();


        return View::make('control-panel.hotel.hotels.edit')
            ->with(
                array(
                    'hotelprofile' => $hotelprofile,
                    'hotelcategorieslist' => $hotelcategorieslist,
                    'checkedhotelcategories' => $checkedhotelcategories,
                    'hotelfacilitieslist' => $hotelfacilitieslist,
                    'checkedhotelfacilities' => $checkedhotelfacilities,
                    'hotelpolicies' => $hotelpolicies,
                    'hotelImages' => $hotelImages
                )
            );
    }

    /**
     * Update the specified hotel in storage.
     *
     * @param  int $id
     * @return Response
     */
    public function update($id)
    {

        $hotel = Hotel::findOrFail($id);

        if (Input::has('val')) {
            $rules = ['val'];

            $data = array(
                'val' => Input::get('val')
            );

            $validator = Validator::make($data, $rules);

            if ($validator->fails()) {
                return Redirect::back()->withErrors($validator)->withInput();
            }

            if ($hotel->update($data)) {

                return Redirect::back()->with(
                    array(
                        'successmessage' => 'Successfully Updated'
                    )
                );

            }

            return Redirect::back();
        }

        if (Input::has('update_hotel')) {
            Session::forget('manage');

            $data = Input::all();

            $validator = Validator::make($data, Hotel::$updateOverviewRules);

            if ($validator->fails()) {
                return Redirect::back()->withErrors($validator)->withInput();
            }

            $hotelcategories = Input::get('category_id');
            DB::table('hotel_hotel_category')->where('hotel_id', $id)->delete();

            if (!empty($hotelcategories)) {
                foreach ($hotelcategories as $hotelcategory) {
                    DB::table('hotel_hotel_category')->insert(
                        array(
                            'hotel_id' => $id,
                            'hotel_category_id' => $hotelcategory
                        )
                    );
                }
            }
        }

        if (Input::has('update_location')) {
            Session::put('manage', 'location');

            $data = Input::all();

            $validator = Validator::make($data, Hotel::$updateLocationRules);

            if ($validator->fails()) {
                return Redirect::back()->withErrors($validator)->withInput();
            }

            if ($hotel->update($data)) {

                return Redirect::back()->with(
                    array(
                        'successmessage' => 'Successfully Updated'
                    )
                );

            }

        }


        if ($hotelfacilties = Input::get('hotel_facility_id')) {

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

        if (Input::has('update_policies')) {
            Session::put('manage', 'policies');
        }


//        $hotelprofile = Hotel::findOrFail($id);
//
//        $validator = Validator::make($data = Input::all(), Hotel::$updaterules);
//
//        if ($validator->fails())
//        {
//            return Redirect::back()->withErrors($validator)->withInput();
//        }
//


        return Redirect::back()->with(
            array(
                'successmessage' => 'successfully updated'
            )
        );

    }

    /**
     * Remove the specified hotel from storage.
     *
     * @param  int $id
     * @return Response
     */

    public function destroy($id)
    {
        Hotel::destroy($id);

        return Redirect::back();
    }

}
