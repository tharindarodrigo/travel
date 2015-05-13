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
		$hotelprofile = Hotelprofile::findOrFail($id);

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
		$hotelprofile = Hotelprofile::find($id);

		return View::make('hotelprofiles.edit', compact('hotelprofile'));
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
