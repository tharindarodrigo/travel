<?php

class FlightDetailsController extends \BaseController {

	/**
	 * Display a listing of flightdetails
	 *
	 * @return Response
	 */
	public function index()
	{
		$flightdetails = Flightdetail::all();

		return View::make('flightdetails.index', compact('flightdetails'));
	}

	/**
	 * Show the form for creating a new flightdetail
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('flightdetails.create');
	}

	/**
	 * Store a newly created flightdetail in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$validator = Validator::make($data = Input::all(), Flightdetail::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		Flightdetail::create($data);

		return Redirect::route('flightdetails.index');
	}

	/**
	 * Display the specified flightdetail.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$flightdetail = Flightdetail::findOrFail($id);

		return View::make('flightdetails.show', compact('flightdetail'));
	}

	/**
	 * Show the form for editing the specified flightdetail.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$flightdetail = Flightdetail::find($id);

		return View::make('flightdetails.edit', compact('flightdetail'));
	}

	/**
	 * Update the specified flightdetail in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$flightdetail = Flightdetail::findOrFail($id);

        $data = array();

		$validator = Validator::make($data = Input::all(), Flightdetail::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		$flightdetail->update($data);

		return Redirect::route('flightdetails.index');
	}

	/**
	 * Remove the specified flightdetail from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		Flightdetail::destroy($id);

		return Redirect::route('flightdetails.index');
	}

}
