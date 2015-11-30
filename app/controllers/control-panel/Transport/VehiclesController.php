<?php

class VehiclesController extends \BaseController {

    /**
     * Display a listing of Vehicles
     *
     * @return Response
     */
    public function index()
    {
        Session::forget('edit');
        $vehicles = Vehicle::all();
        return View::make('control-panel.transportation.vehicles',compact('vehicles'));
    }

    /**
     * Show the form for creating a new Vehicle
     *
     * @return Response
     */
    public function create()
    {



        return Redirect::back();
    }

    /**
     * Store a newly created Vehicle in storage.
     *
     * @return Response
     */
    public function store()
    {
        $validator = Validator::make($data = Input::all(), Vehicle::$rules);

        if ($validator->fails())
        {
            return Redirect::back()->withErrors($validator)->withInput();
        }

        Vehicle::create($data);

        return $this->index();
    }

    /**
     * Display the specified Vehicle.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $vehicles = Vehicle::findOrFail($id);

        return View::make('control-panel.transportation.vehicles', compact('vehicles'));
    }

    /**
     * Show the form for editing the specified Vehicle.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {

        $vehicle = Vehicle::findOrFail($id);
        $vehicles = Vehicle::all();
        Session::put('edit', 'edit');

        return View::make('control-panel.transportation.vehicles', compact('vehicle','vehicles'));
    }

    /**
     * Update the specified Vehicle in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id)
    {
        $Vehicle = Vehicle::findOrFail($id);

        $validator = Validator::make($data = Input::all(), Vehicle::$rules);

        if ($validator->fails())
        {
            return Redirect::back()->withErrors($validator)->withInput();
        }

        $Vehicle->update($data);

        return $this->index();
    }

    /**
     * Remove the specified Vehicle from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        Vehicle::destroy($id);

        return Redirect::route('control-panel.transportation.vehicles.index');
    }

}
