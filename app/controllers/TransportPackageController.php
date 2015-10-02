<?php

class TransportPackageController extends \BaseController {

	/**
	 * Display a listing of transportpackages
	 *
	 * @return Response
	 */
	public function index()
	{
		$transportpackages = Transportpackage::all();

		return View::make('transportpackages.index', compact('transportpackages'));
	}

	/**
	 * Show the form for creating a new transportpackage
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('transportpackages.create');
	}

	/**
	 * Store a newly created transportpackage in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$validator = Validator::make($data = Input::all(), Transportpackage::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		Transportpackage::create($data);

		return Redirect::route('transportpackages.index');
	}

	/**
	 * Display the specified transportpackage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$transportpackage = Transportpackage::findOrFail($id);

		return View::make('transportpackages.show', compact('transportpackage'));
	}

	/**
	 * Show the form for editing the specified transportpackage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$transportpackage = Transportpackage::find($id);

		return View::make('transportpackages.edit', compact('transportpackage'));
	}

	/**
	 * Update the specified transportpackage in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$transportpackage = Transportpackage::findOrFail($id);

		$validator = Validator::make($data = Input::all(), Transportpackage::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		$transportpackage->update($data);

		return Redirect::route('transportpackages.index');
	}

	/**
	 * Remove the specified transportpackage from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		Transportpackage::destroy($id);

		return Redirect::route('transportpackages.index');
	}

}
