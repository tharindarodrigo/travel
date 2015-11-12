<?php

class HotelReviewsController extends \BaseController {

	/**
	 * Display a listing of hotelreviews
	 *
	 * @return Response
	 */
	public function index()
	{
		$hotelreviews = HotelReview::all();

		return View::make('hotelreviews.index', compact('hotelreviews'));
	}

	/**
	 * Show the form for creating a new hotelreview
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('hotelreviews.create');
	}

	/**
	 * Store a newly created hotelreview in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$validator = Validator::make($data = Input::all(), HotelReview::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		HotelReview::create($data);

		return Redirect::route('hotelreviews.index');
	}

	/**
	 * Display the specified hotelreview.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$hotelreview = HotelReview::findOrFail($id);

		return View::make('hotelreviews.show', compact('hotelreview'));
	}

	/**
	 * Show the form for editing the specified hotelreview.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$hotelreview = HotelReview::find($id);

		return View::make('hotelreviews.edit', compact('hotelreview'));
	}

	/**
	 * Update the specified hotelreview in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$hotelreview = HotelReview::findOrFail($id);

		$validator = Validator::make($data = Input::all(), HotelReview::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		$hotelreview->update($data);

		return Redirect::route('hotelreviews.index');
	}

	/**
	 * Remove the specified hotelreview from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		HotelReview::destroy($id);

		return Redirect::route('hotelreviews.index');
	}

}
