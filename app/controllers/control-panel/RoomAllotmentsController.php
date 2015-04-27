<?php

class RoomAllotmentsController extends \BaseController {

	/**
	 * Display a listing of roomallotments
	 *
	 * @return Response
	 */
	public function index()
	{
		$roomallotments = Roomallotment::all();

		return View::make('roomallotments.index', compact('roomallotments'));
	}

	/**
	 * Show the form for creating a new roomallotment
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('roomallotments.create');
	}

	/**
	 * Store a newly created roomallotment in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$validator = Validator::make($data = Input::all(), Roomallotment::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		Roomallotment::create($data);

		return Redirect::route('roomallotments.index');
	}

	/**
	 * Display the specified roomallotment.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$roomallotment = Roomallotment::findOrFail($id);

		return View::make('roomallotments.show', compact('roomallotment'));
	}

	/**
	 * Show the form for editing the specified roomallotment.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$roomallotment = Roomallotment::find($id);

		return View::make('roomallotments.edit', compact('roomallotment'));
	}

	/**
	 * Update the specified roomallotment in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$roomallotment = Roomallotment::findOrFail($id);

		$validator = Validator::make($data = Input::all(), Roomallotment::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		$roomallotment->update($data);

		return Redirect::route('roomallotments.index');
	}

	/**
	 * Remove the specified roomallotment from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		Roomallotment::destroy($id);

		return Redirect::route('roomallotments.index');
	}

}
