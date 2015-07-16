<?php

class MealBasesController extends \BaseController
{

    /**
     * Display a listing of mealbases
     *
     * @return Response
     */
    public function index()
    {
        Session::forget('edit');

        $mealbases = Mealbasis::all();

        return View::make('control-panel.hotel.general.mealBases', compact('mealbases'));
    }

    /**
     * Show the form for creating a new mealbasis
     *
     * @return Response
     */
    public function create()
    {
        return View::make('mealbases.create');
    }

    /**
     * Store a newly created mealbasis in storage.
     *
     * @return Response
     */
    public function store()
    {

        $validator = Validator::make($data = Input::all(), Mealbasis::$rules);

        if ($validator->fails()) {
            return Redirect::back()->withErrors($validator)->withInput();
        }


        if ($mealbasis = Mealbasis::create($data)) {
            
            Session::flash('successful-action', 'Hotel Facility was created Successfully');
        } else {
            Session::flash('unsuccessful-action', 'Creating Hotel Facility was Unsuccessful');
        }

        return Redirect::route('control-panel.hotel.meal-bases.index');
    }

    /**
     * Display the specified mealbasis.
     *
     * @param  int $id
     * @return Response
     */
    public function show($id)
    {
        $mealbasis = Mealbasis::findOrFail($id);

        return View::make('mealbases.show', compact('mealbasis'));
    }

    /**
     * Show the form for editing the specified mealbasis.
     *
     * @param  int $id
     * @return Response
     */
    public function edit($id)
    {
        $Roomfacility = Mealbasis::find($id);
        $mealbases = Mealbasis::all();
        Session::put('edit', 'edit');

        return View::make('control-panel.hotel.general.mealbases')
            ->with(array(
                'mealbases' => $mealbases,
                'Mealbasis' => $Roomfacility
            ));
    }

    /**
     * Update the specified mealbasis in storage.
     *
     * @param  int $id
     * @return Response
     */
    public function update($id)
    {

        $mealbasis = Mealbasis::findOrFail($id);

        $data = Input::all();

        if (!Input::has('val')) {
            $rules = MealBasis::$rules;
        } else {
            $rules = ['val'];
        }

        $validator = Validator::make($data, $rules);

        if ($validator->fails()) {
            return Redirect::back()->withErrors($validator)->withInput();
        }


        if ($mealbasis->update($data)) {

            Session::flash('successful-action', 'Hotel Facility was updated Successfully');

        } else {
            Session::flash('unsuccessful-action', 'Hotel Facility update was Unsuccessful');
        }

        return Redirect::route('control-panel.hotel.meal-bases.index');
    }

    /**
     * Remove the specified mealbasis from storage.
     *
     * @param  int $id
     * @return Response
     */
    public function destroy($id)
    {
        if ($delete = Mealbasis::destroy($id)) {

            //Delete the icon with respect to the record
            File::delete('public/control-panel-assets/images/meal-bases/'.$id.'.png');

            Session::flash('successful-action', 'Item was deleted Successfully');
        } else {
            Session::flash('unsuccessful-action', 'Item deletion was Unsuccessful');
        }

        return Redirect::route('control-panel.hotel.meal-bases.index');
    }

}
