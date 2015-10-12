<?php

class TransportationController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 * GET /transportation
	 *
	 * @return Response
	 */
	public function index()
	{

	}

	/**
	 * Show the form for creating a new resource.
	 * GET /transportation/create
	 *
	 * @return Response
	 */
	public function create()
	{
        $cities = City::all();
        $cityList = City::getCitiesWithCoordinates($cities);
		return View::make('transportation.create',compact('cities','cityList'));
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /transportation
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}

	/**
	 * Display the specified resource.
	 * GET /transportation/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 * GET /transportation/{id}/edit
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 * PUT /transportation/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 * DELETE /transportation/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}