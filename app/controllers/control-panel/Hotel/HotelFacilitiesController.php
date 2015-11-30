<?php

class HotelFacilitiesController extends \BaseController
{

    /**
     * Display a listing of hotelfacilities
     *
     * @return Response
     */
    public function index()
    {
        Session::forget('edit');

        $hotelfacilities = HotelFacility::orderBy('hotel_facility')->get();

        return View::make('control-panel.hotel.general.hotelFacilities', compact('hotelfacilities'));
    }

    /**
     * Show the form for creating a new hotelfacility
     *
     * @return Response
     */
    public function create()
    {
        return View::make('hotelfacilities.create');
    }

    /**
     * Store a newly created hotelfacility in storage.
     *
     * @return Response
     */
    public function store()
    {

        $validator = Validator::make($data = Input::all(), HotelFacility::$rules);

        if ($validator->fails()) {
            return Redirect::back()->withErrors($validator)->withInput();
        }


        if ($hotelfacility = HotelFacility::create($data)) {
            if(Input::file('icon')){
                Image::make(Input::file('icon'))
                    ->encode('png')
                    ->resize(32, 32, function ($constraint) {
                        $constraint->aspectRatio();
                    })->save('public/control-panel-assets/images/hotel-facilities/'.$hotelfacility->id.'.png');
            }

            Session::flash('successful-action', 'Hotel Facility was created Successfully');
        } else {
            Session::flash('unsuccessful-action', 'Creating Hotel Facility was Unsuccessful');
        }

        return Redirect::route('control-panel.hotel.hotel-facilities.index');
    }

    /**
     * Display the specified hotelfacility.
     *
     * @param  int $id
     * @return Response
     */
    public function show($id)
    {
        $hotelfacility = HotelFacility::findOrFail($id);

        return View::make('hotelfacilities.show', compact('hotelfacility'));
    }

    /**
     * Show the form for editing the specified hotelfacility.
     *
     * @param  int $id
     * @return Response
     */
    public function edit($id)
    {
        $Hotelfacility = HotelFacility::find($id);
        $hotelfacilities = HotelFacility::all();
        Session::put('edit', 'edit');

        return View::make('control-panel.hotel.general.hotelfacilities')
            ->with(array(
                'hotelfacilities' => $hotelfacilities,
                'Hotelfacility' => $Hotelfacility
            ));
    }

    /**
     * Update the specified hotelfacility in storage.
     *
     * @param  int $id
     * @return Response
     */
    public function update($id)
    {

        $hotelfacility = HotelFacility::findOrFail($id);

        $data = Input::all();

        if (!Input::has('val')) {
            $rules = HotelFacility::$rules;
        } else {
            $rules = ['val'];
        }

        $validator = Validator::make($data, $rules);

//        dd('dasda');

        if ($validator->fails()) {
            return Redirect::back()->withErrors($validator)->withInput();
        }


        if ($hotelfacility->update($data)) {

            if(Input::file('icon')){

//                dd('asdasd');
                File::delete('public/control-panel-assets/images/hotel-facilities/'.$id.'.png');

                Image::make(Input::file('icon'))
                    ->encode('png')
                    ->resize(32, 32, function ($constraint) {
                        $constraint->aspectRatio();
                    })->save('public/control-panel-assets/images/hotel-facilities/'.$id.'.png');
            }
            Session::flash('successful-action', 'Hotel Facility was updated Successfully');

        } else {
            Session::flash('unsuccessful-action', 'Hotel Facility update was Unsuccessful');
        }

        return Redirect::route('control-panel.hotel.hotel-facilities.index');
    }

    /**
     * Remove the specified hotelfacility from storage.
     *
     * @param  int $id
     * @return Response
     */
    public function destroy($id)
    {
        if ($delete = HotelFacility::destroy($id)) {

            //Delete the icon with respect to the record
            File::delete('public/control-panel-assets/images/hotel-facilities/'.$id.'.png');

            Session::flash('successful-action', 'Item was deleted Successfully');
        } else {
            {
                Session::flash('unsuccessful-action', 'Item deletion was Unsuccessful <h3>:(</h3>');
            }
        }

        return Redirect::route('control-panel.hotel.hotel-facilities.index');
    }

}
