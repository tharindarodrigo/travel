<?php

class ExcursionRatesController extends \BaseController {

	/**
	 * Display a listing of excursionrates
	 *
	 * @return Response
	 */
	public function index()
	{
		$excursionrates = Excursionrate::all();

		return View::make('excursionrates.index', compact('excursionrates'));
	}

	/**
	 * Show the form for creating a new excursionrate
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('excursionrates.create');
	}

	/**
	 * Store a newly created excursionrate in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$validator = Validator::make($data = Input::all(), Excursionrate::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		Excursionrate::create($data);

		return Redirect::route('excursionrates.index');
	}

	/**
	 * Display the specified excursionrate.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$excursionrate = Excursionrate::findOrFail($id);

		return View::make('excursionrates.show', compact('excursionrate'));
	}

	/**
	 * Show the form for editing the specified excursionrate.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$excursionrate = Excursionrate::find($id);

		return View::make('excursionrates.edit', compact('excursionrate'));
	}

	/**
	 * Update the specified excursionrate in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$excursionrate = Excursionrate::findOrFail($id);

		$validator = Validator::make($data = Input::all(), Excursionrate::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		$excursionrate->update($data);

		return Redirect::route('excursionrates.index');
	}

	/**
	 * Remove the specified excursionrate from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		Excursionrate::destroy($id);

		return Redirect::route('excursionrates.index');
	}

}
