<?php

class RoomFacilitiesController extends \BaseController
{

    /**
     * Display a listing of roomfacilities
     *
     * @return Response
     */
    public function index()
    {
        Session::forget('edit');

        $roomfacilities = Roomfacility::orderBy('room_facility','asc')->get();

        return View::make('control-panel.hotel.general.roomFacilities', compact('roomfacilities'));
    }

    /**
     * Show the form for creating a new roomfacility
     *
     * @return Response
     */
    public function create()
    {
        return View::make('roomfacilities.create');
    }

    /**
     * Store a newly created roomfacility in storage.
     *
     * @return Response
     */
    public function store()
    {

        $validator = Validator::make($data = Input::all(), Roomfacility::$rules);

        if ($validator->fails()) {
            return Redirect::back()->withErrors($validator)->withInput();
        }


        if ($roomfacility = Roomfacility::create($data)) {
            if(Input::file('icon')){

                Image::make(Input::file('icon'))
                    ->encode('png')
                    ->resize(32, 32, function ($constraint) {
                        $constraint->aspectRatio();
                    })->save('public/control-panel-assets/images/room-facilities/'.$roomfacility->id.'.png');
            }

            Session::flash('successful-action', 'Room Facility was created Successfully');

        } else {
            Session::flash('unsuccessful-action', 'Creating Room Facility was Unsuccessful');
        }

        return Redirect::route('control-panel.hotel.room-facilities.index');
    }

    /**
     * Display the specified roomfacility.
     *
     * @param  int $id
     * @return Response
     */
    public function show($id)
    {
        $roomfacility = Roomfacility::findOrFail($id);

        return View::make('roomfacilities.show', compact('roomfacility'));
    }

    /**
     * Show the form for editing the specified roomfacility.
     *
     * @param  int $id
     * @return Response
     */
    public function edit($id)
    {
        $Roomfacility = Roomfacility::find($id);
        $roomfacilities = Roomfacility::all();
        Session::put('edit', 'edit');

        return View::make('control-panel.hotel.general.roomfacilities')
            ->with(array(
                'roomfacilities' => $roomfacilities,
                'Roomfacility' => $Roomfacility
            ));
    }

    /**
     * Update the specified roomfacility in storage.
     *
     * @param  int $id
     * @return Response
     */
    public function update($id)
    {

        $roomfacility = Roomfacility::findOrFail($id);

        $data = Input::all();

        if (!Input::has('val')) {
            $rules = RoomFacility::$rules;
        } else {
            $rules = ['val'];
        }

        $validator = Validator::make($data, $rules);

//        dd('dasda');

        if ($validator->fails()) {
            return Redirect::back()->withErrors($validator)->withInput();
        }


        if ($roomfacility->update($data)) {

            if(Input::file('icon')){

//                dd('asdasd');
                File::delete('public/control-panel-assets/images/room-facilities/'.$id.'.png');

                Image::make(Input::file('icon'))
                    ->encode('png')
                    ->resize(32, 32, function ($constraint) {
                        $constraint->aspectRatio();
                    })->save('public/control-panel-assets/images/room-facilities/'.$id.'.png');
            }
            Session::flash('successful-action', 'Room Facility was updated Successfully');

        } else {
            Session::flash('unsuccessful-action', 'Room Facility update was Unsuccessful');
        }

        return Redirect::route('control-panel.hotel.room-facilities.index');
    }

    /**
     * Remove the specified roomfacility from storage.
     *
     * @param  int $id
     * @return Response
     */
    public function destroy($id)
    {
        if ($delete = Roomfacility::destroy($id)) {

            //Delete the icon with respect to the record
            File::delete('public/control-panel-assets/images/room-facilities/'.$id.'.png');

            Session::flash('successful-action', 'Item was deleted Successfully');
        } else {
            {
                Session::flash('unsuccessful-action', 'Item deletion was Unsuccessful <h3>:(</h3>');
            }
        }

        return Redirect::route('control-panel.hotel.room-facilities.index');
    }

}
