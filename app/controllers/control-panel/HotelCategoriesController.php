<?php

class HotelCategoriesController extends \BaseController
{

    /**
     * Display a listing of hotelcategories
     *
     * @return Response
     */
    public function index()
    {
        Session::forget('edit');
        $hotelcategories = Hotelcategory::all();

        return View::make('control-panel.hotel.general.hotelCategories', compact('hotelcategories'));
    }

    /**
     * Show the form for creating a new hotelcategory
     *
     * @return Response
     */
    public function create()
    {
        return View::make('hotelcategories.create');
    }

    /**
     * Store a newly created hotelcategory in storage.
     *
     * @return Response
     */
    public function store()
    {
        $validator = Validator::make($data = Input::all(), Hotelcategory::$rules);

        if ($validator->fails()) {
            return Redirect::back()->withErrors($validator)->withInput();
        }

        if(Hotelcategory::create($data)){
            Session::flash('successful-action', 'Item was updated Successfully');
        }

        return Redirect::route('control-panel.hotel.hotel_categories.index');
    }

    /**
     * Display the specified hotelcategory.
     *
     * @param  int $id
     * @return Response
     */
    public function show($id)
    {
        $hotelcategory = Hotelcategory::findOrFail($id);

//		return View::make('hotelcategories.show', compact('hotelcategory'));
        return Redirect::route('control-panel.hotel.hotel_categories.index', compact('hotelcategory'));
    }

    /**
     * Show the form for editing the specified hotelcategory.
     *
     * @param  int $id
     * @return Response
     */
    public function edit($id)
    {
        $Hotelcategory = Hotelcategory::find($id);
        $hotelcategories = Hotelcategory::all();
        Session::put('edit', 'edit');
//        dd(print_r($Hotelcategory));
        return View::make('control-panel.hotel.general.hotelCategories')
            ->with(array(
                'hotelcategories' => $hotelcategories,
                'Hotelcategory' => $Hotelcategory
            ));
    }

    /**
     * Update the specified hotelcategory in storage.
     *
     * @param  int $id
     * @return Response
     */
    public function update($id)
    {
//        dd(Input::all());

        $hotelcategory = Hotelcategory::findOrFail($id);

        $data = Input::all();

        if (!Input::has('val')) {
            $rules = HotelCategory::$rules;
        } else {
            $rules = ['val'];
        }

        $validator = Validator::make($data, $rules);

        if ($validator->fails()) {
            return Redirect::back()->withErrors($validator)->withInput();
        }


        if($hotelcategory->update($data)){

            Session::flash('successful-action', 'Item was updated Successfully');

        }

        return Redirect::route('control-panel.hotel.hotel_categories.index');
    }

    /**
     * Remove the specified hotelcategory from storage.
     *
     * @param  int $id
     * @return Response
     */
    public function destroy($id)
    {
        $delete = Hotelcategory::destroy($id);

        if($delete){
            Session::flash('successful-action', 'Item was deleted Successfully');
        }

        Session::flash('message', 'Successfully Deleted Hotel Category');

        return Redirect::route('control-panel.hotel.hotel_categories.index');

    }

}
