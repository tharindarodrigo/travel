<?php

class VehiclesController extends \BaseController {

	/**
	 * Display a listing of vehicles
	 *
	 * @return Response
	 */
	public function index()
	{
		$vehicles = Vehicle::all();

		return View::make('vehicles.index', compact('vehicles'));
	}

	/**
	 * Show the form for creating a new vehicle
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('vehicles.create');
	}

	/**
	 * Store a newly created vehicle in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$validator = Validator::make($data = Input::all(), Vehicle::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		Vehicle::create($data);

		return Redirect::route('vehicles.index');
	}

	/**
	 * Display the specified vehicle.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$vehicle = Vehicle::findOrFail($id);

		return View::make('vehicles.show', compact('vehicle'));
	}

	/**
	 * Show the form for editing the specified vehicle.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$vehicle = Vehicle::find($id);

		return View::make('vehicles.edit', compact('vehicle'));
	}

	/**
	 * Update the specified vehicle in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$vehicle = Vehicle::findOrFail($id);

		$validator = Validator::make($data = Input::all(), Vehicle::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		$vehicle->update($data);

		return Redirect::route('vehicles.index');
	}

	/**
	 * Remove the specified vehicle from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		Vehicle::destroy($id);

		return Redirect::route('vehicles.index');
	}

}
