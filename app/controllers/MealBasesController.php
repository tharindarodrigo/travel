<?php

class MealBasesController extends \BaseController {

	/**
	 * Display a listing of mealbases
	 *
	 * @return Response
	 */
	public function index()
	{
		$mealbases = Mealbasis::all();

		return View::make('control-panel.hotel.general.mealBases', compact('mealbases'));
	}

	/**
	 * Show the form for creating a new mealbasis
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('mealbases.create');
	}

	/**
	 * Store a newly created mealbasis in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$validator = Validator::make($data = Input::all(), Mealbasis::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		Mealbasis::create($data);

		return Redirect::route('mealbases.index');
	}

	/**
	 * Display the specified mealbasis.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$mealbasis = Mealbasis::findOrFail($id);

		return View::make('mealbases.show', compact('mealbasis'));
	}

	/**
	 * Show the form for editing the specified mealbasis.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$mealbasis = Mealbasis::find($id);

		return View::make('mealbases.edit', compact('mealbasis'));
	}

	/**
	 * Update the specified mealbasis in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$mealbasis = Mealbasis::findOrFail($id);

		$validator = Validator::make($data = Input::all(), Mealbasis::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		$mealbasis->update($data);

		return Redirect::route('mealbases.index');
	}

	/**
	 * Remove the specified mealbasis from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		Mealbasis::destroy($id);

		return Redirect::route('mealbases.index');
	}

}
