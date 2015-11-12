<?php

use Illuminate\Database\Eloquent\ModelNotFoundException;

class RoomTypesController extends \BaseController
{

    private $_user;
    private $_parameters;

    public function __construct()
    {
        $this->_user = Auth::user();
        $this->_parameters = Route::current()->parameters();
        if(!User::hasHotelPermission($this->_user, $this->_parameters['hotels']))
            if (!Entrust::hasRole('Admin')) {
                App::abort(403);
            }
    }

    /**
     * Display a listing of roomtypes
     *
     * @return Response
     */
    public function index($hotelid)
    {
        $roomtypes = RoomType::where('hotel_id', $hotelid)->get();

        return View::make('control-panel.hotel.rooms.index')->with(array(
            'hotelid' => $hotelid,
            'roomtypes' => $roomtypes
        ));
    }

    /**
     * Show the form for creating a new roomtype
     *
     * @return Response
     */
    public function create($hotelid)
    {

//        Session::put('roomspec',array(1,3,5));
//        $roomspecs = DB::table('room_specifications')->whereIn('id',Session::get('roomspec'))->get();
        $roomspecifications = RoomSpecification::all();
        $roomfacilities = RoomFacility::where('val',1)->orderBy('room_facility')->get();
        return View::make('control-panel.hotel.rooms.create', compact('hotelid', 'roomfacilities', 'roomspecifications'));

    }

    /**
     * Store a newly created roomtype in storage.
     *
     * @return Response
     */
    public function store($hotel_id)
    {
        $data = Input::all();
        $data['hotel_id'] = $hotel_id;
        $data['user_id'] = Auth::user()->id;
        $data['val'] = 1;


        $validator = Validator::make($data, RoomType::$rules);

        if ($validator->fails()) {
            return Redirect::back()->withErrors($validator)->withInput();
        }

        if ($roomType = RoomType::create($data)) {

            $roomFacilities = Input::get('room_facility_id');
            if (!empty($roomFacilities)) {

                foreach ($roomFacilities as $roomFacility) {
                    DB::table('room_facility_room_type')->insert(
                        array(
                            'room_facility_id' => $roomFacility,
                            'room_type_id' => $roomType->id
                        )
                    );
                }
            }

            $roomspecifications = Input::get('room_specification');
            if (!empty($roomspecifications)) {
                foreach ($roomspecifications as $roomSpecification) {
                    DB::table('room_specification_room_type')->insert(
                        array(
                            'room_specification_id' => $roomSpecification,
                            'room_type_id' => $roomType->id
                        )
                    );
                }
            }

            $images = Input::file('images');
            if (count($images) > 1) {
                $x = 1;
                foreach ($images as $image) {
                    Image::make($image)
                        ->encode('jpg')
                        ->resize(1000, null, function ($constraint) {
                            $constraint->aspectRatio();
                        })->save('public/images/room_images/' . $roomType->id . '_' . $x . '.jpg');
                }
            }
        }

        return Redirect::route('control-panel.hotel.hotels.room-types.create', $hotel_id);
    }


    /**
     * Display the specified roomtype.
     *
     * @param  int $id
     * @return Response
     */
    public function show($id)
    {
        $roomtype = RoomType::findOrFail($id);

        return View::make('roomtypes.show', compact('roomtype'));
    }

    /**
     * Show the form for editing the specified roomtype.
     *
     * @param  int $id
     * @return Response
     */
    public function edit($hotelid, $id)
    {

        try {
            $roomtype = RoomType::find($id);
        } catch (ModelNotFoundException $e) {
            return Redirect::to('control-panel/errors/recordNotFound');
        }

        $roomfacilitieslist = RoomFacility::orderBy('room_facility', 'asc')->get();
        $roomfacilities = DB::table('room_facility_room_type')->where('room_type_id', $id)->select(array('room_facility_id'))->get();
        $checkedroomfacilities = array();
        foreach ($roomfacilities as $roomfacility) {
            $checkedroomfacilities[] = $roomfacility->room_facility_id;
        }

        $roomspecificationlist = RoomSpecification::all();

        $roomspecifications = DB::table('room_specification_room_type')->where('room_type_id', $id)->select(array('room_specification_id'))->get();
        $checkedroomspecifications = array();
        foreach ($roomspecifications as $roomspecification) {
            $checkedroomspecifications[] = $roomspecification->room_specification_id;
        }

        $roomImages = array();
        $roomImageList = File::glob('public/images/room_images/' . $id . '_*');
//        dd($roomImages);
        foreach ($roomImageList as $roomImage) {
            $roomImages[] = basename($roomImage);
        }

        return View::make('control-panel.hotel.rooms.edit', compact('roomtype', 'hotelid', 'roomfacilitieslist', 'checkedroomfacilities', 'roomspecificationlist', 'checkedroomspecifications', 'roomImages'));
    }

    /**
     * Update the specified roomtype in storage.
     *
     * @param  int $id
     * @return Response
     */
    public function update($hotelid, $id)
    {

        // Delete Images
        if (Input::has('delete_images')) {

            $files = Input::get('files_to_delete');
            foreach ($files as $file) {
                File::delete('public/images/room_images/' . $file);
            }

            return Redirect::back();
        }

        $roomtype = RoomType::findOrFail($id);

        if (!Input::has('val')) {
            $data = array(
                'room_type' => Input::get('room_type'),
                'description' => Input::get('description'),
                'user_id' => Auth::user()->id
            );
        } else {
//            dd(Input::get('val'));
            $data = array(
                'val' => Input::get('val')
            );
            if ($roomtype->update($data)) {
                Session::flash('successmessage', 'Room Successfully updated');
            }

            return Redirect::back();

        }


        $validator = Validator::make($data, RoomType::$rules);

        if ($validator->fails()) {
            return Redirect::back()->withErrors($validator)->withInput();
        }

        if (Input::hasFile('images')) {
            $files = Input::file('images');

            foreach ($files as $file) {
                Image::make($file)
                    ->encode('jpg')
                    ->save('public/images/room_images/' . $roomtype->id . '_' . str_random(10) . '.jpg');
            }
        }


        $roomfacilities = Input::get('room_facility_id');
        DB::table('room_facility_room_type')->where('room_type_id', $id)->delete();

        if (!empty($roomfacilities)) {
            foreach ($roomfacilities as $roomfacility) {
                $roomfacilitydata = array(
                    'room_facility_id' => $roomfacility,
                    'room_type_id' => $id
                );

                DB::table('room_facility_room_type')->insert($roomfacilitydata);
            }
        }


        $roomspecifications = Input::get('room_specification_id');
        DB::table('room_specification_room_type')->where('room_type_id', $id)->delete();
        if (!empty($roomspecifications)) {

            foreach ($roomspecifications as $roomspecification) {
                $roomfacilitydata = array(
                    'room_specification_id' => $roomspecification,
                    'room_type_id' => $id
                );

                DB::table('room_specification_room_type')->insert($roomfacilitydata);
            }
        }


        if ($roomtype->update($data)) {
            Session::flash('successmessage', 'Room Successfully updated');
        }

        return Redirect::back();
    }

    /**
     * Remove the specified roomtype from storage.
     *
     * @param  int $id
     * @return Response
     */
    public function destroy($hotel_id, $id)
    {

        try {

            $delete = RoomType::destroy($id);

            $files = File::glob('public/images/room_images/' . $id . '_*');

            if (!empty($files)) {
                foreach ($files as $file) {
                    File::delete('public/images/room_images/' . $file);
                }
            }

            return Redirect::back();

        } catch (Exception $e) {

            Session::flash('error-msg', 'You are not allowed to delete this Record. Instead You can deactivate record');
            return Redirect::back();
        }


    }

}
