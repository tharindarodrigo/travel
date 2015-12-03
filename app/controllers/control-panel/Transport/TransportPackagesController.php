<?php

class TransportPackagesController extends \BaseController
{

    /**
     * Display a listing of TransportPackages
     *
     * @return Response
     */
    public function index()
    {
        Session::forget('edit');
        $packages = TransportPackage::all();
        return View::make('control-panel.transportation.packages', compact('packages'));
    }

    /**
     * Show the form for creating a new TransportPackage
     *
     * @return Response
     */
    public function create()
    {
        return View::make('');
    }

    /**
     * Store a newly created TransportPackage in storage.
     *
     * @return Response
     */
    public function store()
    {
        $validator = Validator::make($data = Input::all(), TransportPackage::$rules);

        if ($validator->fails()) {
            //dd($validator->errors());
            return Redirect::back()->withErrors($validator)->withInput();
        }

        TransportPackage::create($data);

        return self::index();
    }

    /**
     * Display the specified TransportPackage.
     *
     * @param  int $id
     * @return Response
     */
    public function show($id)
    {
        //$packages = TransportPackage::findOrFail($id);

        return self::index();
    }

    /**
     * Show the form for editing the specified TransportPackage.
     *
     * @param  int $id
     * @return Response
     */
    public function edit($id)
    {

        $transportpackage = TransportPackage::findOrFail($id);
        $packages = TransportPackage::with('originCity')->with('destinationCity')->get();
        Session::put('edit', 'edit');

        return View::make('control-panel.transportation.packages', compact('transportpackage', 'packages'));
    }

    /**
     * Update the specified TransportPackage in storage.
     *
     * @param  int $id
     * @return Response
     */
    public function update($id)
    {
        $transportpackage = TransportPackage::findOrFail($id);

        $validator = Validator::make($data = Input::all(), TransportPackage::$rules);

        if ($validator->fails()) {
            return Redirect::back()->withErrors($validator)->withInput();
        }

        $transportpackage->update($data);

        Session::forget('edit');

        return self::index();
    }

    /**
     * Remove the specified TransportPackage from storage.
     *
     * @param  int $id
     * @return Response
     */
    public function destroy($id)
    {
        TransportPackage::destroy($id);

        return self::index();
    }

}
