<?php

class TaxesController extends \BaseController {

	/**
	 * Display a listing of taxes
	 *
	 * @return Response
	 */
	public function index()
	{
		$taxes = Tax::all();

		return View::make('taxes.index', compact('taxes'));
	}

	/**
	 * Show the form for creating a new tax
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('taxes.create');
	}

	/**
	 * Store a newly created tax in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$validator = Validator::make($data = Input::all(), Tax::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		Tax::create($data);

		return Redirect::route('taxes.index');
	}

	/**
	 * Display the specified tax.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$tax = Tax::findOrFail($id);

		return View::make('taxes.show', compact('tax'));
	}

	/**
	 * Show the form for editing the specified tax.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$tax = Tax::find($id);

		return View::make('taxes.edit', compact('tax'));
	}

	/**
	 * Update the specified tax in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$tax = Tax::findOrFail($id);

		$validator = Validator::make($data = Input::all(), Tax::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		$tax->update($data);

		return Redirect::route('taxes.index');
	}

	/**
	 * Remove the specified tax from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		Tax::destroy($id);

		return Redirect::route('taxes.index');
	}

}
