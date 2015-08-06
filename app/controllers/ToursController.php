<?php

class ToursController extends \BaseController {

	/**
	 * Display a listing of tours
	 *
	 * @return Response
	 */
	public function index()
	{
		$tours = Tour::all();

		return View::make('tours.index', compact('tours'));
	}

	/**
	 * Show the form for creating a new tour
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('tours.create');
	}

	/**
	 * Store a newly created tour in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$validator = Validator::make($data = Input::all(), Tour::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		Tour::create($data);

		return Redirect::route('tours.index');
	}

	/**
	 * Display the specified tour.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$tour = Tour::findOrFail($id);

		return View::make('tours.show', compact('tour'));
	}

	/**
	 * Show the form for editing the specified tour.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$tour = Tour::find($id);

		return View::make('tours.edit', compact('tour'));
	}

	/**
	 * Update the specified tour in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$tour = Tour::findOrFail($id);

		$validator = Validator::make($data = Input::all(), Tour::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		$tour->update($data);

		return Redirect::route('tours.index');
	}

	/**
	 * Remove the specified tour from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		Tour::destroy($id);

		return Redirect::route('tours.index');
	}

}
