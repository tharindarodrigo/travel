<?php

class RoomFacilitiesController extends \BaseController {

	/**
	 * Display a listing of roomfacilities
	 *
	 * @return Response
	 */
	public function index()
	{
		$roomfacilities = Roomfacility::all();

		return View::make('roomfacilities.index', compact('roomfacilities'));
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

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		Roomfacility::create($data);

		return Redirect::route('roomfacilities.index');
	}

	/**
	 * Display the specified roomfacility.
	 *
	 * @param  int  $id
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
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$roomfacility = Roomfacility::find($id);

		return View::make('roomfacilities.edit', compact('roomfacility'));
	}

	/**
	 * Update the specified roomfacility in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$roomfacility = Roomfacility::findOrFail($id);

		$validator = Validator::make($data = Input::all(), Roomfacility::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		$roomfacility->update($data);

		return Redirect::route('roomfacilities.index');
	}

	/**
	 * Remove the specified roomfacility from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		Roomfacility::destroy($id);

		return Redirect::route('roomfacilities.index');
	}

}
