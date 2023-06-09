<?php

class TourTypesController extends \BaseController {

	/**
	 * Display a listing of tourtypes
	 *
	 * @return Response
	 */
	public function index()
	{
		$tourtypes = TourType::all();

		return View::make('tourtypes.index', compact('tourtypes'));
	}

	/**
	 * Show the form for creating a new tourtype
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('tourtypes.create');
	}

	/**
	 * Store a newly created tourtype in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$validator = Validator::make($data = Input::all(), TourType::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		TourType::create($data);

		return Redirect::route('tourtypes.index');
	}

	/**
	 * Display the specified tourtype.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$tourtype = TourType::findOrFail($id);

		return View::make('tourtypes.show', compact('tourtype'));
	}

	/**
	 * Show the form for editing the specified tourtype.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$tourtype = TourType::find($id);

		return View::make('tourtypes.edit', compact('tourtype'));
	}

	/**
	 * Update the specified tourtype in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$tourtype = TourType::findOrFail($id);

		$validator = Validator::make($data = Input::all(), TourType::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		$tourtype->update($data);

		return Redirect::route('tourtypes.index');
	}

	/**
	 * Remove the specified tourtype from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		TourType::destroy($id);

		return Redirect::route('tourtypes.index');
	}

}
