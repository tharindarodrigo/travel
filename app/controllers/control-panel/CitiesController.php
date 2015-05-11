<?php

class CitiesController extends \BaseController
{

    /**
     * Display a listing of cities
     *
     * @return Response
     */
    public function index()
    {
        Session::forget('edit');

        $cities = City::all();

        return View::make('control-panel.general.cities', compact('cities'));
    }

    /**
     * Show the form for creating a new city
     *
     * @return Response
     */
    public function create()
    {
        return View::make('cities.create');
    }

    /**
     * Store a newly created city in storage.
     *
     * @return Response
     */
    public function store()
    {
        $validator = Validator::make($data = Input::all(), City::$rules);

        if ($validator->fails()) {
            return Redirect::back()->withErrors($validator)->withInput();
        }

        if (City::create($data)) {
            Session::flash('successful-action', 'Hotel Facility was created Successfully');
        } else {
            Session::flash('unsuccessful-action', 'Creating Hotel Facility was Unsuccessful');
        }

        return Redirect::route('control-panel.general.cities.index');
    }

    /**
     * Display the specified city.
     *
     * @param  int $id
     * @return Response
     */
    public function show($id)
    {
        $market = City::findOrFail($id);

        return View::make('cities.show', compact('city'));
    }

    /**
     * Show the form for editing the specified city.
     *
     * @param  int $id
     * @return Response
     */
    public function edit($id)
    {
        $City = City::find($id);
        $cities = City::all();
        Session::put('edit', 'edit');

        return View::make('control-panel.general.cities')
            ->with(array(
                'cities' => $cities,
                'City' => $City
            ));
    }

    /**
     * Update the specified city in storage.
     *
     * @param  int $id
     * @return Response
     */
    public function update($id)
    {
        $city = City::findOrFail($id);

        $data = Input::all();

        if (!Input::has('val')) {
            $rules = City::$rules;
        } else {
            $rules = ['val'];
        }

        $validator = Validator::make($data, $rules);

        if ($validator->fails()) {
            return Redirect::back()->withErrors($validator)->withInput();
        }

        if ($city->update($data)) {
            Session::flash('successful-action', 'City was updated Successfully');

        } else {
            Session::flash('unsuccessful-action', 'City update was Unsuccessful');
        }

        return Redirect::route('control-panel.general.cities.index');
    }

    /**
     * Remove the specified city from storage.
     *
     * @param  int $id
     * @return Response
     */
    public function destroy($id)
    {
        if (City::destroy($id)) {
            Session::flash('successful-action', 'Item was deleted Successfully');
        } else {
            Session::flash('unsuccessful-action', 'Item deletion was Unsuccessful');
        }

        return Redirect::route('control-panel.general.cities.index');
    }

}
