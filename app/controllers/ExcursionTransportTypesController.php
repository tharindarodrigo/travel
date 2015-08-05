<?php

class ExcursionTransportTypesController extends \BaseController {

	/**
	 * Display a listing of excursiontransporttypes
	 *
	 * @return Response
	 */
	public function index()
	{
		$excursiontransporttypes = Excursiontransporttype::all();

		return View::make('excursiontransporttypes.index', compact('excursiontransporttypes'));
	}

	/**
	 * Show the form for creating a new excursiontransporttype
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('excursiontransporttypes.create');
	}

	/**
	 * Store a newly created excursiontransporttype in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$validator = Validator::make($data = Input::all(), Excursiontransporttype::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		Excursiontransporttype::create($data);

		return Redirect::route('excursiontransporttypes.index');
	}

	/**
	 * Display the specified excursiontransporttype.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$excursiontransporttype = Excursiontransporttype::findOrFail($id);

		return View::make('excursiontransporttypes.show', compact('excursiontransporttype'));
	}

	/**
	 * Show the form for editing the specified excursiontransporttype.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$excursiontransporttype = Excursiontransporttype::find($id);

		return View::make('excursiontransporttypes.edit', compact('excursiontransporttype'));
	}

	/**
	 * Update the specified excursiontransporttype in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$excursiontransporttype = Excursiontransporttype::findOrFail($id);

		$validator = Validator::make($data = Input::all(), Excursiontransporttype::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		$excursiontransporttype->update($data);

		return Redirect::route('excursiontransporttypes.index');
	}

	/**
	 * Remove the specified excursiontransporttype from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		Excursiontransporttype::destroy($id);

		return Redirect::route('excursiontransporttypes.index');
	}

}
