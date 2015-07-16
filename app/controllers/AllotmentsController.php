<?php

class AllotmentsController extends \BaseController {

	/**
	 * Display a listing of allotments
	 *
	 * @return Response
	 */
	public function index()
	{
		$allotments = Allotment::all();

		return View::make('allotments.index', compact('allotments'));
	}

	/**
	 * Show the form for creating a new allotment
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('allotments.create');
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

		return Redirect::route('allotments.index');
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

		return View::make('allotments.show', compact('allotment'));
	}

	/**
	 * Show the form for editing the specified allotment.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$allotment = Allotment::find($id);

		return View::make('allotments.edit', compact('allotment'));
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

		return Redirect::route('allotments.index');
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

		return Redirect::route('allotments.index');
	}

}
