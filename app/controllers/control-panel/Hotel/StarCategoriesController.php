<?php

class StarCategoriesController extends \BaseController
{

    /**
     * Display a listing of starcategories
     *
     * @return Response
     */
    public function index()
    {
        Session::forget('edit');
        $starcategories = Starcategory::all();

        return View::make('control-panel.hotel.general.starCategories', compact('starcategories'));
    }

    /**
     * Show the form for creating a new starcategory
     *
     * @return Response
     */
    public function create()
    {
        return View::make('starcategories.create');
    }

    /**
     * Store a newly created starcategory in storage.
     *
     * @return Response
     */
    public function store()
    {

        $validator = Validator::make($data = Input::all(), Starcategory::$rules);

        if ($validator->fails()) {
//            dd($validator->errors());
            return Redirect::back()->withErrors($validator)->withInput();
        }

        if (Starcategory::create($data)) {
            Session::flash('successful-action', 'Hotel Facility was created Successfully');
        } else {
            Session::flash('unsuccessful-action', 'Creating Hotel Facility was Unsuccessful');
        }

        return Redirect::route('control-panel.hotel.star-categories.index');

    }

    /**
     * Display the specified starcategory.
     *
     * @param  int $id
     * @return Response
     */
    public function show($id)
    {
        $starcategory = Starcategory::findOrFail($id);

        return View::make('starcategories.show', compact('starcategory'));
    }

    /**
     * Show the form for editing the specified starcategory.
     *
     * @param  int $id
     * @return Response
     */
    public function edit($id)
    {
        $Starcategory = Starcategory::find($id);
        $starcategories = Starcategory::all();
        Session::put('edit', 'edit');
        return View::make('control-panel.hotel.general.starCategories')
            ->with(array(
                'starcategories' => $starcategories,
                'Starcategory' => $Starcategory
            ));
    }

    /**
     * Update the specified starcategory in storage.
     *
     * @param  int $id
     * @return Response
     */
    public function update($id)
    {
        $starcategory = Starcategory::findOrFail($id);

        $data = Input::all();

        if (!Input::has('val')) {
            $rules = Starcategory::$rules;
        } else {
            $rules = ['val'];
        }

        $validator = Validator::make($data, $rules);

        if ($validator->fails()) {

//            dd($validator->errors());
            return Redirect::back()->withErrors($validator)->withInput();
        }

        $starcategory->update($data);

        return Redirect::route('control-panel.hotel.star-categories.index');
    }

    /**
     * Remove the specified starcategory from storage.
     *
     * @param  int $id
     * @return Response
     */
    public function destroy($id)
    {
        if (StarCategory::destroy($id)) {

            Session::flash('successful-action', 'Item was deleted Successfully');
        } else {
            Session::flash('unsuccessful-action', 'Item deletion was Unsuccessful');
        }

        return Redirect::route('control-panel.hotel.star-categories.index');
    }

}
