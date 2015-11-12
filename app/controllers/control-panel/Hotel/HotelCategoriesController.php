<?php
use Illuminate\Database\Eloquent\ModelNotFoundException;

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
        $hotelcategories = HotelCategory::all();

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
        $validator = Validator::make($data = Input::all(), HotelCategory::$rules);

        if ($validator->fails()) {
            return Redirect::back()->withErrors($validator)->withInput();
        }

        if (HotelCategory::create($data)) {
            Session::flash('successful-action', 'Hotel Category was created Successfully');
        } else {
            Session::flash('unsuccessful-action', 'Creating Hotel Category was Unsuccessful <h3>:(</h3>');
        }

        return Redirect::route('control-panel.hotel.hotel-categories.index');
    }

    /**
     * Display the specified hotelcategory.
     *
     * @param  int $id
     * @return Response
     */
    public function show($id)
    {
        $hotelcategory = HotelCategory::findOrFail($id);

//		return View::make('hotelcategories.show', compact('hotelcategory'));
        return Redirect::route('control-panel.hotel.hotel-categories.index', compact('hotelcategory'));
    }

    /**
     * Show the form for editing the specified hotelcategory.
     *
     * @param  int $id
     * @return Response
     */
    public function edit($id)
    {

        try{
            $Hotelcategory = HotelCategory::findOrFail($id);
        } catch (ModelNotFoundException $e){
            return Redirect::to('control-panel/errors/record-not-found');
        }
        $hotelcategories = HotelCategory::all();
        Session::put('edit', 'edit');

        return View::make('control-panel.hotel.general.hotelCategories',compact('hotelcategories','Hotelcategory'));
//            ->with(array(
//                'hotelcategories' => $hotelcategories,
//                'Hotelcategory' => $Hotelcategory
//            ));
    }

    /**
     * Update the specified hotelcategory in storage.
     *
     * @param  int $id
     * @return Response
     */
    public function update($id)
    {



        try{
            $hotelcategory = HotelCategory::findOrFail($id);
        } catch (ModelNotFoundException $e){
            return Redirect::to('control-panel/errors/record-not-found');
        }

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


        if ($hotelcategory->update($data)) {
            Session::flash('successful-action', 'Hotel Category was updated Successfully');

        } else {
            Session::flash('unsuccessful-action', 'Hotel Category update was Unsuccessful');
        }


        return Redirect::route('control-panel.hotel.hotel-categories.index');
    }

    /**
     * Remove the specified hotelcategory from storage.
     *
     * @param  int $id
     * @return Response
     */
    public function destroy($id)
    {

        if (HotelCategory::destroy($id)) {
            Session::flash('successful-action', 'Item was deleted Successfully');
        } else {
            {
                Session::flash('unsuccessful-action', 'Item deletion was Unsuccessful <h3>:(</h3>');
            }
        }

        return Redirect::route('control-panel.hotel.hotel-categories.index');

    }

}
