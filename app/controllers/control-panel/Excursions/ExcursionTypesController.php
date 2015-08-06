<?php

class ExcursionTypesController extends \BaseController {

	/**
	 * Display a listing of excursiontypes
	 *
	 * @return Response
	 */
	public function index()
	{
		$excursiontypes = Excursiontype::all();

		return View::make('excursiontypes.index', compact('excursiontypes'));
	}

	/**
	 * Show the form for creating a new excursiontype
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('excursiontypes.create');
	}

	/**
	 * Store a newly created excursiontype in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$validator = Validator::make($data = Input::all(), Excursiontype::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		Excursiontype::create($data);

		return Redirect::route('excursiontypes.index');
	}

	/**
	 * Display the specified excursiontype.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$excursiontype = Excursiontype::findOrFail($id);

		return View::make('excursiontypes.show', compact('excursiontype'));
	}

	/**
	 * Show the form for editing the specified excursiontype.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$excursiontype = Excursiontype::find($id);

		return View::make('excursiontypes.edit', compact('excursiontype'));
	}

	/**
	 * Update the specified excursiontype in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$excursiontype = Excursiontype::findOrFail($id);

		$validator = Validator::make($data = Input::all(), Excursiontype::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		$excursiontype->update($data);

		return Redirect::route('excursiontypes.index');
	}

	/**
	 * Remove the specified excursiontype from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		Excursiontype::destroy($id);

		return Redirect::route('excursiontypes.index');
	}

}
