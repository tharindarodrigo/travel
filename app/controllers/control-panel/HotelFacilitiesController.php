<?php

class HotelFacilitiesController extends \BaseController {

	/**
	 * Display a listing of hotelfacilities
	 *
	 * @return Response
	 */
	public function index()
	{
		$hotelfacilities = Hotelfacility::all();

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
		$validator = Validator::make($data = Input::all(), Hotelfacility::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput() ;
		}

		Hotelfacility::create($data);

		return Redirect::route('hotelfacilities.index');
	}

	/**
	 * Display the specified hotelfacility.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$hotelfacility = Hotelfacility::findOrFail($id);

		return View::make('hotelfacilities.show', compact('hotelfacility'));
	}

	/**
	 * Show the form for editing the specified hotelfacility.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$hotelfacility = Hotelfacility::find($id);

		return View::make('hotelfacilities.edit', compact('hotelfacility'));
	}

	/**
	 * Update the specified hotelfacility in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$hotelfacility = Hotelfacility::findOrFail($id);

		$validator = Validator::make($data = Input::all(), Hotelfacility::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		$hotelfacility->update($data);

		return Redirect::route('hotelfacilities.index');
	}

	/**
	 * Remove the specified hotelfacility from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		Hotelfacility::destroy($id);

		return Redirect::route('hotelfacilities.index');
	}

}
