<?php

class AllotmentsController extends \BaseController {

	/**
	 * Display a listing of allotments
	 *
	 * @return Response
	 */
	public function index($hotelid)
	{
        Session::forget('edit');
		$allotments = Allotment::all();

		return View::make('control-panel.hotel.allotments.index', compact('allotments', 'hotelid'));
	}

	/**
	 * Show the form for creating a new allotment
	 *
	 * @return Response
	 */
	public function create($hotelid)
	{
        $allotments = Allotment::all();
		return View::make('control-panel.hotel.allotments.index', compact('hotelid', 'allotments'));
	}

	/**
	 * Store a newly created allotment in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$validator = Validator::make($data = Input::all(), Allotment::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		Allotment::create($data);

		return Redirect::route('control-panel.hotel.allotments.index');
	}

	/**
	 * Display the specified allotment.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$allotment = Allotment::findOrFail($id);

		return View::make('control-panel.hotel.allotments.show', compact('allotment'));
	}

	/**
	 * Show the form for editing the specified allotment.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($hotelid,$id)
	{
        $allotments = Allotment::all();
		$allotment = Allotment::find($id);
        Session::flash('edit','edit');

		return View::make('control-panel.hotel.allotments.allotments', compact('hotelid','allotment', 'allotments'));
	}

	/**
	 * Update the specified allotment in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$allotment = Allotment::findOrFail($id);

		$validator = Validator::make($data = Input::all(), Allotment::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		$allotment->update($data);

		return Redirect::route('control-panel.hotel.allotments.index');
	}

	/**
	 * Remove the specified allotment from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		Allotment::destroy($id);

		return Redirect::route('control-panel.hotel.allotments.index');
	}

}
