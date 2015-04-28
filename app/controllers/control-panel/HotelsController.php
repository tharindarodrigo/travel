<?php

class HotelsController extends \BaseController {

	/**
	 * Display a listing of hotels
	 *
	 * @return Response
	 */
	public function index()
	{
		$hotels = Hotel::with('city', '')->get();

		return View::make('control-panel.hotel.general.hotelList', compact('hotels'));
	}

	/**
	 * Show the form for creating a new hotel
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('hotels.create');
	}

	/**
	 * Store a newly created hotel in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$validator = Validator::make($data = Input::all(), Hotel::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		Hotel::create($data);

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
