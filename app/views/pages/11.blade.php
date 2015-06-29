<?php

class HotelController extends \BaseController {

/**
 * Display a listing of the resource.
 *
 * @return Response
*/
public function hotel_list()
{
return View::make('hotel.hotel_list');
}

public function listView($type_name = '', $status_id = '', $city_id = '', $area_id = '')
{
Session::put('view_type','list');
try{
$property_results = $this->viewProperty($type_name, $status_id, $city_id, $area_id);

return View::make('property.property_list')
->with($property_results);
}catch(Exception $e){

return View::make('property.no_results');
}
}

public function gridView($type_name = '', $status_id = '', $city_id = '', $area_id = '')
{
Session::put('view_type','grid');
try{
$property_results = $this->viewProperty($type_name, $status_id, $city_id, $area_id);
return View::make('property.property')
->with($property_results);
}catch(Exception $e){

return View::make('property.no_results');

}
}

public function viewProperty($type_name = '', $status_name = '', $city_name = '', $area_name = '')
{

$path = array();

if (empty($type_name)) {
$type_id = '%';
} else {
$get_type_id = DB::table('property_type')->where('name', 'LIKE', $type_name)->first();
if (!empty($get_type_id)) {
$type_id = $get_type_id->id;
} else {
$type_id = 0;
}
}

if (empty($status_name)) {
$status_id = '%';
} else {
$get_status_id = DB::table('property_status')->where('name', 'LIKE', $status_name)->first();
empty($get_status_id) ? $status_id = 0 : $status_id = $get_status_id->id;

}

if (empty($city_name)) {
$city_id = '%';
} elseif (!empty($city_name)) {
$city_name = str_replace('-', ' ', $city_name);
$get_city_id = DB::table('cities')->where('city_name', 'LIKE', $city_name)->first();
empty($get_city_id) ? $city_id = 0 : $city_id = $get_city_id->id;

}

if (empty($area_name)) {
$area_id = '%';
} else {
$area_name = str_replace('-', ' ', $area_name);
$get_area_id = DB::table('area')->where('area_name', 'LIKE', $area_name)->first();

if (!empty($get_area_id)) {
$area_id = $get_area_id->id;
} else {
$area_id = '0';
}

}

if (!$property->count()) {
return Redirect::to('/403');
}
return
array(


);

}

/**
* Show the form for creating a new resource.
*
* @return Response
*/
public function create()
{
//
}


/**
* Store a newly created resource in storage.
*
* @return Response
*/
public function store()
{
//
}


/**
* Display the specified resource.
*
* @param  int  $id
* @return Response
*/
public function hotelDetail($id)
{
return View::make('hotel.hotel_details');
}


/**
* Show the form for editing the specified resource.
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
*
* @param  int  $id
* @return Response
*/
public function destroy($id)
{
//
}


}
