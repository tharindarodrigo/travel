<?php

class RatesController extends \BaseController {

	/**
	 * Display a listing of rates
	 *
	 * @return Response
	 */
	public function index()
	{
		$rates = Rate::all();

		return View::make('rates.index', compact('rates'));
	}

	/**
	 * Show the form for creating a new rate
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('rates.create');
	}

	/**
	 * Store a newly created rate in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$validator = Validator::make($data = Input::all(), Rate::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		Rate::create($data);

		return Redirect::route('rates.index');
	}

	/**
	 * Display the specified rate.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$rate = Rate::findOrFail($id);

		return View::make('rates.show', compact('rate'));
	}

	/**
	 * Show the form for editing the specified rate.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$rate = Rate::find($id);

		return View::make('rates.edit', compact('rate'));
	}

	/**
	 * Update the specified rate in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$rate = Rate::findOrFail($id);

		$validator = Validator::make($data = Input::all(), Rate::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		$rate->update($data);

		return Redirect::route('rates.index');
	}

	/**
	 * Remove the specified rate from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		Rate::destroy($id);

		return Redirect::route('rates.index');
	}

}
