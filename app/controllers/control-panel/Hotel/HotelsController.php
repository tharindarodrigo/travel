<?php

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\File;


class HotelsController extends \BaseController
{
    private $_user;

    public function __construct()
    {
        $this->beforeFilter('admin', array('only' => 'create'));
        $this->_user = Auth::user();
    }

    /**
     * Display a listing of hotels
     *
     * @return Response
     */

    public function index()
    {
        if(Entrust::can('manage_all_hotels')){
            $hotels = Hotel::with(array('hotelCategory', 'starCategory','city'))->select('name','val','id','star_category_id','city_id')->get();
        } else {
            $hotels = Hotel::whereHas('user',function($q){
                $q->where('users.id',$this->_user->id);
            })->with(array('hotelCategory', 'starCategory','city'))->select('name','val','id','star_category_id','city_id')->get();
        }

        return View::make('control-panel.hotel.hotels.index', compact('hotels'));
    }

    /**
     * Show the form for creating a new hotel
     *
     * @return Response
     */
    public function create()
    {
        $this->beforeFilter('admin');

        $hotelcategorieslist = HotelCategory::all();
        $hotelcategories = HotelCategory::all();
        $hotelfacilitieslist = HotelFacility::orderBy('hotel_facility','asc')->get();
        $checkedhotelfacilities = array();
        $checkedhotelcategories = array();

        return View::make('control-panel.hotel.hotels.create', compact('hotelcategories', 'hotelcategorieslist', 'checkedhotelcategories', 'hotelfacilitieslist', 'checkedhotelfacilities'));
    }

    /**
     * Store a newly created hotel in storage.
     *
     * @return Response
     */
    public function store()
    {
//        dd(Input::file('images'));

//        dd(Input::all());
        $validator = Validator::make($data = Input::all(), Hotel::$rules);

        if ($validator->fails()) {
//            dd($validator->errors());
            return Redirect::back()->withErrors($validator)->withInput();
        }

        $data['user_id'] = Auth::user()->id;

        if ($hotel = Hotel::create($data)) {

            if (Input::hasFile('images')) {

                $files = Input::file('images');

                foreach($files as $file){
                    Image::make($file)
                        ->encode('jpg')
                        ->save('public/images/hotel_images/' . $hotel->id . '_' .str_random(10). '.jpg');
                }
            }
        }


        $categories = Input::get('category_id');
        if(!empty($categories)){
            foreach ($categories as $category_id) {

                // Enter data into pivot table
                $hotel_hotel_category_data = array(
                    'hotel_id' => $hotel->id,
                    'hotel_category_id' => $category_id
                );
                DB::table('hotel_hotel_category')->insert($hotel_hotel_category_data);
            }
        }


        $facilities = Input::get('hotel_facility_id');
        if(!empty($facilities)){
            foreach ($facilities as $facility_id) {

                // Enter data into pivot table
                $hotel_hotel_facility_data = array(
                    'hotel_id' => $hotel->id,
                    'hotel_facility_id' => $facility_id
                );
                DB::table('hotel_hotel_facility')->insert($hotel_hotel_facility_data);
            }
        }

        return Redirect::route('control-panel.hotel.hotels.index');
    }

    /**
     * Display the specified hotel.
     *
     * @param  int $id
     * @return Response
     */
    public function show($id)
    {
        $hotel = Hotel::findOrFail($id);

        return View::make('hotels.show', compact('hotel'));
    }

    /**
     * Show the form for editing the specified hotel.
     *
     * @param  int $id
     * @return Response
     */
    public function edit($id)
    {
        if(!User::hasHotelPermission($this->_user,$id) && !Entrust::can('manage_all_hotels')){
            App::abort(403);
        }

        Session::forget('edit');

        try{
            $hotelprofile = Hotel::findOrFail($id);
        } catch (ModelNotFoundException $e){
            return Redirect::to('control-panel/errors/404');
        }


        $cancellationpolicy = null;

        if (Input::has('policy_id')) {
            Session::put('manage', 'policies');
            Session::put('edit', 'policies');
            $policy_id = Input::get('policy_id');
//            dd($policy_id);
            $cancellationpolicy = CancellationPolicy::where('id',$policy_id)->first();
//            dd($cancellationpolicy);
        }

        $hotelImages = array();
        $hotelimages = File::glob('images/hotel_images/'.$hotelprofile->id.'_*');

        foreach($hotelimages as $hotelimage){
            $hotelImages[] = basename($hotelimage);
        }

        $hotelcategorieslist = HotelCategory::all();
        $hotelcategories = DB::table('hotel_hotel_category')->where('hotel_id', $id)->get(array('hotel_category_id'));
        $checkedhotelcategories = array();
        foreach ($hotelcategories as $hotelcategory) {
            $checkedhotelcategories[] = $hotelcategory->hotel_category_id;
        }

        $hotelfacilitieslist = HotelFacility::orderBy('hotel_facility','asc')->get();
        $hotelfacilities = DB::table('hotel_hotel_facility')->where('hotel_id', $id)->get(array('hotel_facility_id'));
        $checkedhotelfacilities = array();
        foreach ($hotelfacilities as $hotelfacility) {
            $checkedhotelfacilities[] = $hotelfacility->hotel_facility_id;
        }


        $cancellationpolicies = CancellationPolicy::where('hotel_id', $id)->get();

        return View::make('control-panel.hotel.hotels.edit')
            ->with(
                array(
                    'hotelprofile' => $hotelprofile,
                    'hotelcategorieslist' => $hotelcategorieslist,
                    'checkedhotelcategories' => $checkedhotelcategories,
                    'hotelfacilitieslist' => $hotelfacilitieslist,
                    'checkedhotelfacilities' => $checkedhotelfacilities,
                    'cancellationpolicies' => $cancellationpolicies,
                    'cancellationpolicy' => $cancellationpolicy,
                    'hotelImages' => $hotelImages,
                    'hotelid'=>$id
                )
            );
    }

    /**
     * Update the specified hotel in storage.
     *
     * @param  int $id
     * @return Response
     */
    public function update($id)
    {

        try{
            $hotel = Hotel::findOrFail($id);
        } catch (ModelNotFoundException $e){
            return Redirect::to('control-panel/errors/record-not-found');
        }

        if (Input::has('val')) {
            $rules = ['val'];

            $data = array(
                'val' => Input::get('val')
            );

            $validator = Validator::make($data, $rules);

            if ($validator->fails()) {
                return Redirect::back()->withErrors($validator)->withInput();
            }

            if ($hotel->update($data)) {

                Session::flash('successmessage', 'Hotel Successfully updated');

                return Redirect::back();

            }

            return Redirect::back();
        }

        if (Input::has('update_hotel')) {
            Session::forget('manage');

            $data = Input::all();

            $validator = Validator::make($data, Hotel::$updateOverviewRules);

            if ($validator->fails()) {

                return Redirect::back()->withErrors($validator)->withInput();
            }

            $hotelcategories = Input::get('category_id');
            $hotel->update($data);
            if (!empty($hotelcategories)){

                DB::table('hotel_hotel_category')->where('hotel_id', $id)->delete();

                    foreach ($hotelcategories as $hotelcategory) {

                        DB::table('hotel_hotel_category')->insert(
                            array(
                                'hotel_id' => $id,
                                'hotel_category_id' => $hotelcategory
                            )
                        );
                    }

                Session::put('successmessage', 'Hotel Successfully updated');
                return Redirect::back();

            }

        }

        if (Input::has('update_location')) {
            Session::put('manage', 'location');

            $data = Input::all();

            $validator = Validator::make($data, Hotel::$updateLocationRules) ;

            if ($validator->fails()) {
                return Redirect::back()->withErrors($validator)->withInput();
            }

            if ($hotel->update($data)) {
                Session::flash('successmessage', 'Hotel Successfully updated Hotel Location');
                return Redirect::back();

            }

        }


        if ($hotelfacilties = Input::get('hotel_facility_id')) {

            Session::put('manage', 'facilities');

            DB::table('hotel_hotel_facility')->where('hotel_id', $id)->delete();
            foreach ($hotelfacilties as $hotelfacility) {
                DB::table('hotel_hotel_facility')->insert(
                    array(
                        'hotel_facility_id' => $hotelfacility,
                        'hotel_id' => $id
                    )
                );
            }

            return Redirect::back()->with(
                array(
                    'successmessage' => 'successfully updated'
                )
            );

        }

        if (Input::has('update_child_policies')) {
            Session::put('manage', 'policies');
            $data = Input::all();
            $hotel->update($data);

            return Redirect::back()->with(
                array(
                    'successmessage' => 'successfully updated Child Policy'
                )
            );
        }

        if(Input::has('add_more_images')){
            if (Input::hasFile('images')) {

                $files = Input::file('images');

                foreach($files as $file){
                    Image::make($file)
                        ->encode('jpg')
                        ->save('public/images/hotel_images/' . $hotel->id . '_' .str_random(10). '.jpg');
                }
            }
        }

        if(Input::has('delete_images')){

            Session::put('manage', 'images');
            $files = Input::get('files_to_delete');
            foreach($files as $file){
                File::delete('public/images/hotel_images/'.$file);
            }

            return Redirect::back();
        }

        if(Input::has('update_terms_and_conditions')){
            Session::put('manage', 'termsAndConditions');

            $data = Input::all();

            $validator = Validator::make($data, Hotel::$updateTermsRules);

            if ($validator->fails()) {
                return Redirect::back()->withErrors($validator)->withInput();
            }

            if ($hotel->update($data)) {

                return Redirect::back()->with(
                    array(
                        'successmessage' => 'Successfully Updated'
                    )
                );
            }
        }



        return Redirect::back()->with(
            array(
                'successmessage' => 'successfully updated'
            )
        );

    }

    /**
     * Remove the specified hotel from storage.
     *
     * @param  int $id
     * @return Response
     */

    public function destroy($id)
    {

        try{
            Hotel::destroy($id);

            $files = File::glob('public/control-panel-assets/images/room-images/'.$id.'_*');

            if(!empty($files)){
                foreach($files as $file){
                    File::delete('public/control-panel-assets/images/room-images/'.$file);
                }
            }

            return Redirect::back();
        } catch (Exception $e){

            Session::flash('error-msg','You are not allowed to delete this Record. Instead You can deactivate the record');
            return Redirect::back();
        }
    }

    public function createCancellationPolicy($id)
    {

        $validator = Validator::make($data=Input::all(), CancellationPolicy::$rules);

        if ($validator->fails()) {
            return Redirect::back()->withErrors($validator)->withInput();
        }

        $data['hotel_id'] = $id;
        CancellationPolicy::create($data);
        return Redirect::back();
    }

    public function editCancellationPolicy($id, $policy_id)
    {
        Session::put('edit','editCancellationPolicies');
        $cancellationpolicy = CancellationPolicy::findOrFail($policy_id);

        return Redirect::back()->with(
            array(
                'cancellationpolicy' => $cancellationpolicy
            )
        );
    }

    public function updateCancellationPolicy($id, $policy_id)
    {
        if(Input::has('cancel_update')){
            Session::forget('edit');
            return Redirect::back();
        }

        Session::forget('edit');
        $validator = Validator::make($data=Input::all(), CancellationPolicy::$rules);


        if ($validator->fails()) {
            return Redirect::back()->withErrors($validator)->withInput();
        }

        $data['hotel_id'] = $id;
        $cancellation = CancellationPolicy::findOrFail($policy_id);
        $cancellation->update($data);

        $cancellationpolicies = CancellationPolicy::where('hotel_id', $id)->get();

        return Redirect::back()->with(
            array(
                'cancellationpolicies' => $cancellationpolicies
            )
        );
    }

    public function deleteCancellationPolicy ($id, $policy_id){
        CancellationPolicy::destroy($policy_id);
        return Redirect::route('control-panel.hotel.hotels.edit',$id);
    }


}
