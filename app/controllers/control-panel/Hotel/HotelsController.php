<?php

class HotelsController extends \BaseController {

	/**
	 * Display a listing of hotels
	 *
	 * @return Response
	 */
	public function index()
	{
		$hotels = Hotel::all();

//        dd($hotels);

		return View::make('control-panel.hotel.general.hotelList', compact('hotels'));
	}

	/**
	 * Show the form for creating a new hotel
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('control-panel.hotel.general.hotel');
	}

	/**
	 * Store a newly created hotel in storage.
	 *
	 * @return Response
	 */
	public function store()
	{

//        dd(Input::all());

		$validator = Validator::make($data = Input::all(), Hotel::$rules);

		if ($validator->fails())
		{
//            dd($validator->errors());
			return Redirect::back()->withErrors($validator)->withInput();
		}

        $data['users_id'] = Auth::user()->id;

		$hotel = Hotel::create($data);

        $categories = Input::get('category_id');
        foreach($categories  as $category_id){

            // Enter data into pivot table
            $hotel_hotel_category_data = array(
                'hotel_id' => $hotel->id,
                'hotel_category_id' => $category_id
            );
            DB::table('hotel_hotel_category')->insert($hotel_hotel_category_data);
        }

		return Redirect::route('hotels.index');
	}

	/**
	 * Display the specified hotel.
	 *
	 * @param  int  $id
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
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$hotel = Hotel::find($id);

		return View::make('hotels.edit', compact('hotel'));
	}

	/**
	 * Update the specified hotel in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$hotel = Hotel::findOrFail($id);

		$validator = Validator::make($data = Input::all(), Hotel::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		$hotel->update($data);

		return Redirect::route('hotels.index');
	}

	/**
	 * Remove the specified hotel from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		Hotel::destroy($id);

		return Redirect::route('hotels.index');
	}

}
