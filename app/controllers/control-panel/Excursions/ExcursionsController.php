<?php

class ExcursionsController extends \BaseController {

	/**
	 * Display a listing of excursions
	 *
	 * @return Response
	 */
	public function index()
	{
		$excursions = Excursion::all();

		return View::make('excursions.index', compact('excursions'));
	}

	/**
	 * Show the form for creating a new excursion
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('excursions.create');
	}

	/**
	 * Store a newly created excursion in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$validator = Validator::make($data = Input::all(), Excursion::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		Excursion::create($data);

		return Redirect::route('excursions.index');
	}

	/**
	 * Display the specified excursion.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$excursion = Excursion::findOrFail($id);

		return View::make('excursions.show', compact('excursion'));
	}

	/**
	 * Show the form for editing the specified excursion.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$excursion = Excursion::find($id);

		return View::make('excursions.edit', compact('excursion'));
	}

	/**
	 * Update the specified excursion in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$excursion = Excursion::findOrFail($id);

		$validator = Validator::make($data = Input::all(), Excursion::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		$excursion->update($data);

		return Redirect::route('excursions.index');
	}

	/**
	 * Remove the specified excursion from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		Excursion::destroy($id);

		return Redirect::route('excursions.index');
	}

}
