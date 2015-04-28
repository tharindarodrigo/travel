<?php

class StarCategoriesController extends \BaseController {

	/**
	 * Display a listing of starcategories
	 *
	 * @return Response
	 */
	public function index()
	{
		$starcategories = Starcategory::all();

		return View::make('starcategories.index', compact('starcategories'));
	}

	/**
	 * Show the form for creating a new starcategory
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('starcategories.create');
	}

	/**
	 * Store a newly created starcategory in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$validator = Validator::make($data = Input::all(), Starcategory::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		Starcategory::create($data);

		return Redirect::route('starcategories.index');
	}

	/**
	 * Display the specified starcategory.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$starcategory = Starcategory::findOrFail($id);

		return View::make('starcategories.show', compact('starcategory'));
	}

	/**
	 * Show the form for editing the specified starcategory.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$starcategory = Starcategory::find($id);

		return View::make('starcategories.edit', compact('starcategory'));
	}

	/**
	 * Update the specified starcategory in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$starcategory = Starcategory::findOrFail($id);

		$validator = Validator::make($data = Input::all(), Starcategory::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		$starcategory->update($data);

		return Redirect::route('starcategories.index');
	}

	/**
	 * Remove the specified starcategory from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		Starcategory::destroy($id);

		return Redirect::route('starcategories.index');
	}

}
