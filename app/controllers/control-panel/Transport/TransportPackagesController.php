<?php

class TransportPackagesController extends \BaseController {

	/**
	 * Display a listing of transportpackages
	 *
	 * @return Response
	 */
	public function index()
	{
        Session::forget('edit');
		$packages = Transportpackage::all();
		return View::make('control-panel.transportation.packages',compact('packages'));
	}

	/**
	 * Show the form for creating a new transportpackage
	 *
	 * @return Response
	 */
	public function create()
	{
        return View::make('');
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

		return Redirect::route('control-panel.transportpackages.index');
	}

	/**
	 * Display the specified transportpackage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
        $packages = Transportpackage::findOrFail($id);

		return View::make('transportpackages.show', compact('packages'));
	}

	/**
	 * Show the form for editing the specified transportpackage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{

		$transportpackage = Transportpackage::findOrFail($id);
		$packages = Transportpackage::all();
        Session::put('edit', 'edit');


        return View::make('control-panel.transportation.packages', compact('transportpackage','packages'));
	}

	/**
	 * Update the specified transportpackage in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
        $transportpackage = TransportPackage::findOrFail($id);

		$validator = Validator::make($data = Input::all(), Transportpackage::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		$transportpackage->update($data);

        Session::forget('edit');

		return Redirect::route('control-panel..index');
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
