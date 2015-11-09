<?php

class ExcursionBookingsController extends \BaseController {

	/**
	 * Display a listing of excursionbookings
	 *
	 * @return Response
	 */
	public function index()
	{
		$excursionbookings = Excursionbooking::all();

		return View::make('excursionbookings.index', compact('excursionbookings'));
	}

	/**
	 * Show the form for creating a new excursionbooking
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('excursionbookings.create');
	}

	/**
	 * Store a newly created excursionbooking in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$validator = Validator::make($data = Input::all(), Excursionbooking::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		Excursionbooking::create($data);

		return Redirect::route('excursionbookings.index');
	}

	/**
	 * Display the specified excursionbooking.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$excursionbooking = Excursionbooking::findOrFail($id);

		return View::make('excursionbookings.show', compact('excursionbooking'));
	}

	/**
	 * Show the form for editing the specified excursionbooking.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$excursionbooking = Excursionbooking::find($id);

		return View::make('excursionbookings.edit', compact('excursionbooking'));
	}

	/**
	 * Update the specified excursionbooking in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($booking_id,$id)
	{
		$excursionbooking = Excursionbooking::findOrFail($id);
		if(Input::has('val')){
			if (Input::get('val') == 0)
				$excursionbooking->amount = 0;
		}

		$validator = Validator::make($data = Input::all(), Excursionbooking::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		$excursionbooking->update($data);

		return Redirect::back();
	}

	/**
	 * Remove the specified excursionbooking from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		Excursionbooking::destroy($id);

		return Redirect::route('excursionbookings.index');
	}

}
