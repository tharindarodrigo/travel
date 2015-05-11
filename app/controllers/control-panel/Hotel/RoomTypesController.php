<?php

class RoomTypesController extends \BaseController {

	/**
	 * Display a listing of roomtypes
	 *
	 * @return Response
	 */
	public function index()
	{
		$roomtypes = Roomtype::all();

		return View::make('roomtypes.index', compact('roomtypes'));
	}

	/**
	 * Show the form for creating a new roomtype
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('roomtypes.create');
	}

	/**
	 * Store a newly created roomtype in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$validator = Validator::make($data = Input::all(), Roomtype::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		Roomtype::create($data);

		return Redirect::route('roomtypes.index');
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
	public function edit($id)
	{
		$roomtype = Roomtype::find($id);

		return View::make('roomtypes.edit', compact('roomtype'));
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
