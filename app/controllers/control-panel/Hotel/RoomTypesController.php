<?php

class RoomTypesController extends \BaseController {

	/**
	 * Display a listing of roomtypes
	 *
	 * @return Response
	 */
	public function index($hotelid)
	{
		$roomtypes = Roomtype::where('hotel_id',$hotelid)->get();

//        dd($roomspecifications);


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
	public function create($id)
	{

//        Session::put('roomspec',array(1,3,5));
//        $roomspecs = DB::table('room_specifications')->whereIn('id',Session::get('roomspec'))->get();
        $roomspecifications = RoomSpecification::all();
        $roomfacilities = RoomFacility::all();
        $hotelid = $id;
		return View::make('control-panel.hotel.rooms.create', compact('hotelid','roomfacilities','roomspecifications'));

	}

	/**
	 * Store a newly created roomtype in storage.
	 *
	 * @return Response
	 */
	public function store($hotel_id)
	{

//        dd(Input::all());

        $data = Input::all();
        $data['hotel_id'] = $hotel_id;
        $data['user_id'] = Auth::user()->id;
        $data['val'] = 1;

//        dd($data);


        $validator = Validator::make($data, Roomtype::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		if($roomType = Roomtype::create($data)){

//            dd('success');

            if($roomFacilities = Input::get('room_facility_id')){
                foreach($roomFacilities as $roomFacility){
                    DB::table('room_facility_room_type')->insert(
                        array(
                            'room_facility_id'=> $roomFacility,
                            'room_type_id' => $roomType->id
                        )
                    );
                }
            }

            if($roomspecifications = Input::get('room_specification')){
                foreach($roomspecifications as $roomSpecification){
                    DB::table('room_specification_room_type')->insert(
                        array(
                            'room_specification_id'=> $roomSpecification,
                            'room_type_id' => $roomType->id
                        )
                    );
                }
            }

            $images = Input::file('images');
//            dd(count($images));
            if(count($images)>1){
                $x=1;
                foreach($images as $image){
                    Image::make($image)
                        ->encode('jpg')
                        ->resize(1000, null, function ($constraint) {
                            $constraint->aspectRatio();
                        })->save('public/control-panel-assets/images/rooms/'.$roomType->id.'_'.$x.'.jpg');
                }
            }
        }


		return Redirect::route('control-panel.hotel.hotels.room-types.create',$hotel_id);
	}

	/**
	 * Display the specified roomtype.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$roomtype = Roomtype::findOrFail($id);

		return View::make('roomtypes.show', compact('roomtype'));
	}

	/**
	 * Show the form for editing the specified roomtype.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($hotelid,$id)
	{
		$roomtype = Roomtype::find($id);

        $roomfacilitieslist = RoomFacility::all();
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


        return View::make('control-panel.hotel.rooms.edit', compact('roomtype', 'hotelid', 'roomfacilitieslist', 'checkedroomfacilities','roomspecificationlist', 'checkedroomspecifications'));
	}

	/**
	 * Update the specified roomtype in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$roomtype = Roomtype::findOrFail($id);

		$validator = Validator::make($data = Input::all(), Roomtype::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		$roomtype->update($data);

		return Redirect::route('roomtypes.index');
	}

	/**
	 * Remove the specified roomtype from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		Roomtype::destroy($id);

		return Redirect::route('roomtypes.index');
	}

}
