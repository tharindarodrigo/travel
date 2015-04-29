<?php

class HotelCategoriesController extends \BaseController {

	/**
	 * Display a listing of hotelcategories
	 *
	 * @return Response
	 */
	public function index()
	{
		$hotelcategories = Hotelcategory::all();

		return View::make('control-panel.hotel.general.hotelCategories', compact('hotelcategories'));
	}

	/**
	 * Show the form for creating a new hotelcategory
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('hotelcategories.create');
	}

	/**
	 * Store a newly created hotelcategory in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$validator = Validator::make($data = Input::all(), Hotelcategory::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		Hotelcategory::create($data);

		return Redirect::route('hotelcategories.index');
	}

	/**
	 * Display the specified hotelcategory.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$hotelcategory = Hotelcategory::findOrFail($id);

		return View::make('hotelcategories.show', compact('hotelcategory'));
	}

	/**
	 * Show the form for editing the specified hotelcategory.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$hotelcategory = Hotelcategory::find($id);

		return View::make('hotelcategories.edit', compact('hotelcategory'));
	}

	/**
	 * Update the specified hotelcategory in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$hotelcategory = Hotelcategory::findOrFail($id);

		$validator = Validator::make($data = Input::all(), Hotelcategory::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		$hotelcategory->update($data);

		return Redirect::route('hotelcategories.index');
	}

	/**
	 * Remove the specified hotelcategory from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		Hotelcategory::destroy($id);

		return Redirect::route('hotelcategories.index');
	}

}
