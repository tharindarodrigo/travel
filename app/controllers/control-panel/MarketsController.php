<?php

class MarketsController extends \BaseController {

	/**
	 * Display a listing of markets
	 *
	 * @return Response
	 */
	public function index()
	{
		$markets = Market::all();

		return View::make('control-panel.general.markets', compact('markets'));
	}

	/**
	 * Show the form for creating a new market
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('markets.create');
	}

	/**
	 * Store a newly created market in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$validator = Validator::make($data = Input::all(), Market::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		Market::create($data);

		return Redirect::route('markets.index');
	}

	/**
	 * Display the specified market.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$market = Market::findOrFail($id);

		return View::make('markets.show', compact('market'));
	}

	/**
	 * Show the form for editing the specified market.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$market = Market::find($id);

		return View::make('markets.edit', compact('market'));
	}

	/**
	 * Update the specified market in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$market = Market::findOrFail($id);

		$validator = Validator::make($data = Input::all(), Market::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		$market->update($data);

		return Redirect::route('markets.index');
	}

	/**
	 * Remove the specified market from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		Market::destroy($id);

		return Redirect::route('markets.index');
	}

}
