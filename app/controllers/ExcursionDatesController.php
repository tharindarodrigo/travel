<?php

class ExcursionDatesController extends \BaseController {

	/**
	 * Display a listing of excursiondates
	 *
	 * @return Response
	 */
	public function index()
	{
		$excursiondates = Excursiondate::all();

		return View::make('excursiondates.index', compact('excursiondates'));
	}

	/**
	 * Show the form for creating a new excursiondate
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('excursiondates.create');
	}

	/**
	 * Store a newly created excursiondate in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$validator = Validator::make($data = Input::all(), Excursiondate::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		Excursiondate::create($data);

		return Redirect::route('excursiondates.index');
	}

	/**
	 * Display the specified excursiondate.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$excursiondate = Excursiondate::findOrFail($id);

		return View::make('excursiondates.show', compact('excursiondate'));
	}

	/**
	 * Show the form for editing the specified excursiondate.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$excursiondate = Excursiondate::find($id);

		return View::make('excursiondates.edit', compact('excursiondate'));
	}

	/**
	 * Update the specified excursiondate in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$excursiondate = Excursiondate::findOrFail($id);

		$validator = Validator::make($data = Input::all(), Excursiondate::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		$excursiondate->update($data);

		return Redirect::route('excursiondates.index');
	}

	/**
	 * Remove the specified excursiondate from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		Excursiondate::destroy($id);

		return Redirect::route('excursiondates.index');
	}

}
