<?php

class TransportPackageController extends \BaseController
{

    /**
     *
     * Predefined Transport List
     *
     */
    public function transportList()
    {
        $vehicle_id = array();

        $vehicles = Vehicle::where('val', 1)->get();

        // filtering
        $vehicle = array('0' => 'Select') + Vehicle::lists('vehicle_type', 'id');
        $package = TransportCategory::lists('transport_category', 'id');
        $city = City::lists('city', 'id');
        //$city['%'] = 'Any';

        if (Session::has('st_date')) {
            $st_date = Session::get('st_date');
        } else {
            $st_date = date("Y/m/d");
        }

        if (Session::has('ed_date')) {
            $ed_date = Session::get('ed_date');
        } else {
            $ed_date = date("Y/m/d", strtotime($st_date . ' + 2 days'));
        }


        if (Input::has('get_vehicle_id')) {
            $get_vehicle_id = Input::get('get_vehicle_id');
            $vehicle_id[] = $get_vehicle_id;
        } else if (Input::has('vehicle_filter')) {
            $get_vehicle_id = Input::get('vehicle_filter');
            $vehicle_id[] = $get_vehicle_id;
        } else {
            $get_vehicle_ids = Vehicle::select('id')->get();

            foreach ($get_vehicle_ids as $get_vehicle_id) {
                $vehicle_id[] = $get_vehicle_id->id;
            }
        }

        $from = Input::get('get_from');
        $to = Input::get('get_to');
        $days = Input::get('get_days');

        if (Input::has('price_range_transport')) {
            $price_range_array = Input::get('price_range_transport');
            $price_range = explode(';', $price_range_array);

            $min_rate = $price_range[0];
            $max_rate = $price_range[1];

            $min_trans_rate = $min_rate;
            $max_trans_rate = $max_rate;
        } else {
            $min_rate = 0;
            $max_rate = 10000000;

            $min_trans_rate = TransportPackage::min('rate');
            $max_trans_rate = TransportPackage::max('rate');
        }

//dd($min_rate.'/'.$max_rate);

        if (Input::has('get_from') ) {

            $transport_packages = TransportPackage::WhereHas('Vehicle', function ($r) use ($vehicle_id) {
                $r->whereIn('id', $vehicle_id);
            })
                ->where('val', 1)
                ->where('rate', '>=', $min_rate)
                ->where('rate', '<=', $max_rate)
                ->where('origin', 'LIKE', $from)
                ->where('destination', 'LIKE', $to)
                ->where('days', 'LIKE', $days)
                ->where('transport_category_id', 1)
                //->orderBy('id', 'desc')
                ->paginate(12);

        } else {

            $transport_packages = TransportPackage::WhereHas('Vehicle', function ($r) use ($vehicle_id) {
                $r->whereIn('id', $vehicle_id);
            })
                ->where('val', 1)
                ->where('rate', '>=', $min_rate)
                ->where('rate', '<=', $max_rate)
                //->where('origin', 'LIKE', $from)
                //->where('destination', 'LIKE', $to)
                ->where('days', 'LIKE', $days)
                ->where('transport_category_id', 1)
                ->orderBy('id', 'desc')
                ->paginate(12);

        }


        return View::make('transport.transport_list')
            ->with(
                array(
                    'transport_packages' => $transport_packages,
                    'min_trans_rate' => $min_trans_rate,
                    'max_trans_rate' => $max_trans_rate,
                    'vehicle' => $vehicle,
                    'city' => $city,
                    'vehicles' => $vehicles,
                    'package' => $package,
                    'st_date' => $st_date,
                    'ed_date' => $ed_date,
                )
            );
    }

    // Predefined Transport Cart Create

    public function predefinedTransportCartCreate()
    {

//        Session::forget('predefined_transport');

        $predefined_id = Input::get('predefine_id');
        $check_in_date = date("Y-m-d", strtotime(Input::get('check_in')));

        $predefined_key = $predefined_id;

        $predefined_transport_details = array(
            'check_in_date' => $check_in_date,
            'predefine_id' => $predefined_id,
        );

        if (Session::has('predefined_transport')) {
            $data = Session::get('predefined_transport');
            $data[$predefined_key] = $predefined_transport_details;
        } else {
            $data = [];
            $data[$predefined_key] = $predefined_transport_details;
        }

        //$data['total_cost'] = $total_cost;

        Session::put('predefined_transport', $data);

        return Response::json(Session::get('predefined_transport'));

    }

    // delete predefined transport cart item

    public function predefinedTransportCartItemDelete()
    {

        $deletable = Input::get('predefined_transport_cart_item_delete');

        if (Session::has('predefined_transport')) {
            $data = Session::get('predefined_transport');
            //dd($data);
            unset($data[$deletable]);

            if (!empty($data)) {
                Session::put('predefined_transport', $data);
            } else {
                Session::forget('predefined_transport');
            }
        }

        return Redirect::to('/booking-cart');

    }


    /**
     *
     * Predefined Transport List
     *
     */
    public function weddingPackages()
    {
        $vehicle_id = array();

        $vehicles = Vehicle::where('val', 1)->get();

        // filtering
        $vehicle = array('0' => 'Select') + Vehicle::lists('vehicle_type', 'id');
        $package = TransportCategory::lists('transport_category', 'id');
        $city = City::lists('city', 'id');


        if (Session::has('st_date')) {
            $st_date = Session::get('st_date');
        } else {
            $st_date = date("Y/m/d");
        }

        if (Session::has('ed_date')) {
            $ed_date = Session::get('ed_date');
        } else {
            $ed_date = date("Y/m/d", strtotime($st_date . ' + 2 days'));
        }


        if (Input::has('get_vehicle_id')) {
            $get_vehicle_id = Input::get('get_vehicle_id');
            $vehicle_id[] = $get_vehicle_id;
        } else {
            $get_vehicle_ids = Vehicle::select('id')->get();
            foreach ($get_vehicle_ids as $get_vehicle_id) {
                $vehicle_id[] = $get_vehicle_id->id;
            }
        }

        if (Input::has('vehicle_filter')) {
            $get_vehicle_id = Input::get('vehicle_filter');
            $vehicle_id[] = $get_vehicle_id;
        } else {
            $get_vehicle_ids = Vehicle::select('id')->get();
            foreach ($get_vehicle_ids as $get_vehicle_id) {
                $vehicle_id[] = $get_vehicle_id->id;
            }
        }

        $vehicle_type_id = Input::get('get_vehicle_type_id');
        $hours = Input::get('get_hours');

        if (Input::has('price_range_transport')) {
            $price_range_array = Input::get('price_range_transport');
            $price_range = explode(';', $price_range_array);

            $min_rate = $price_range[0];
            $max_rate = $price_range[1];

            $min_trans_rate = $min_rate;
            $max_trans_rate = $max_rate;
        } else {
            $min_rate = 0;
            $max_rate = 10000000;

            $min_trans_rate = TransportPackage::where('transport_category_id', 2)->min('rate');
            $max_trans_rate = TransportPackage::where('transport_category_id', 2)->max('rate');
        }


        $transport_packages = TransportPackage::WhereHas('Vehicle', function ($r) use ($vehicle_id) {
            $r->whereIn('id', $vehicle_id);
        })
            ->where('val', 1)
            ->where('rate', '>=', $min_rate)
            ->where('rate', '<=', $max_rate)
            ->where('days', 'LIKE', $hours)
            ->where('vehicle_type_id', 'LIKE', $vehicle_type_id)
            ->where('transport_category_id', 2)
            ->paginate(12);


        return View::make('transport.wedding_packages')
            ->with(
                array(
                    'transport_packages' => $transport_packages,
                    'min_trans_rate' => $min_trans_rate,
                    'max_trans_rate' => $max_trans_rate,
                    'vehicle' => $vehicle,
                    'vehicles' => $vehicles,
                    'package' => $package,
                    'city' => $city,
                    'st_date' => $st_date,
                    'ed_date' => $ed_date,
                )
            );
    }

    // get vehicle list

    public function getVehicleList()
    {

        $vehicle_type = Input::get('vehicle');

        $vehicle = VehicleType::where('vehicle_id', $vehicle_type)->lists('vehicle', 'id');

        return Response::json($vehicle);

    }


    // Predefined Transport Cart Create

    public function weddingPackagesCartCreate()
    {

//        Session::forget('predefined_transport');

        $predefined_id = Input::get('predefine_id');
        $check_in_date = date("Y-m-d", strtotime(Input::get('check_in')));

        $predefined_key = $predefined_id;

        $predefined_transport_details = array(
            'check_in_date' => $check_in_date,
            'predefine_id' => $predefined_id,
        );

        if (Session::has('predefined_transport')) {
            $data = Session::get('predefined_transport');
            $data[$predefined_key] = $predefined_transport_details;
        } else {
            $data = [];
            $data[$predefined_key] = $predefined_transport_details;
        }

        //$data['total_cost'] = $total_cost;

        Session::put('predefined_transport', $data);

        return Response::json(Session::get('predefined_transport'));

    }

    // delete predefined transport cart item

    public function weddingPackagesCartItemDelete()
    {

        $deletable = Input::get('predefined_transport_cart_item_delete');

        if (Session::has('predefined_transport')) {
            $data = Session::get('predefined_transport');
            //dd($data);
            unset($data[$deletable]);

            if (!empty($data)) {
                Session::put('predefined_transport', $data);
            } else {
                Session::forget('predefined_transport');
            }
        }

        return Redirect::to('/booking-cart');

    }


    /**
     * Create Transport Package
     *
     *
     */
    public function createMyTrip()
    {

        $city = City::where('val', 1)->lists('city', 'id');
        $vehicle = Vehicle::where('val', 1)->lists('vehicle_type', 'id');

        if (Session::has('st_date')) {
            $st_date = Session::get('st_date');
        } else {
            $st_date = date("Y/m/d");
        }

        if (Session::has('ed_date')) {
            $ed_date = Session::get('ed_date');
        } else {
            $ed_date = date("Y/m/d", strtotime($st_date . ' + 2 days'));
        }

        return View::make('transport.create_my_trip')
            ->with(
                array(
                    'st_date' => $st_date,
                    'ed_date' => $ed_date,
                    'city' => $city,
                    'vehicle' => $vehicle,
                )
            );

    }

    // transport cart

    public function transportCart()
    {

        if (Input::has('vehicle_type')) {

            if (Input::has('pick_up_date')) {
                $pick_up_date = date("y-m-d", strtotime(Input::get('pick_up_date')));
            }

            if (Input::has('drop_off_date')) {
                $drop_off_date = date("y-m-d", strtotime(Input::get('drop_off_date')));
            }

            $vehicle_type = Input::get('vehicle_type');
            $vehicle_id = Vehicle::where('vehicle_type', $vehicle_type)->first()->id;
            $origin = Input::get('origin');
            $origin_id = City::where('city', $origin)->select('id')->first()->id;
            $destination_1 = Input::get('destination_1');
            $destination_2 = Input::get('destination_2');
            $destination_3 = Input::get('destination_3');
            $destination_1_id = City::where('city', $destination_1)->select('id')->first()->id;
            $destination_2_id = City::where('city', $destination_2)->select('id')->first()->id;
            $destination_3_id = City::where('city', $destination_3)->select('id')->first()->id;
            $pick_up_time_hour = Input::get('pick_up_time_hour');
            $pick_up_time_minutes = Input::get('pick_up_time_minutes');
            $drop_off_time_hour = Input::get('drop_off_time_hour');
            $drop_off_time_minutes = Input::get('drop_off_time_minutes');
            $distance = Input::get('totalDistance');
            $vehicle_cost = Vehicle::where('id', $vehicle_id)->first()->rate;
            $transport_cart_key = $vehicle_id . '_' . $origin_id . '_' . $destination_1_id;

            $cost = $distance * $vehicle_cost;

            if (!empty($destination_3)) {
                $destination_last = $destination_3;
            } elseif (!empty($destination_2)) {
                $destination_last = $destination_2;
            } else {
                $destination_last = $destination_1;
            }

            $transport_cart_box = array(
                'vehicle_type' => $vehicle_type,
                'vehicle_id' => $vehicle_id,
                'origin' => $origin,
                'destination_1' => $destination_1,
                'destination_2' => $destination_2,
                'destination_3' => $destination_3,
                'destination_last' => $destination_last,
                'pick_up_date' => $pick_up_date,
                'pick_up_time_hour' => $pick_up_time_hour,
                'pick_up_time_minutes' => $pick_up_time_minutes,
                'drop_off_date' => $drop_off_date,
                'drop_off_time_hour' => $drop_off_time_hour,
                'drop_off_time_minutes' => $drop_off_time_minutes,
                'transport_cart_key' => $transport_cart_key,
                'cost' => number_format($cost, 2),

            );


            if (Session::has('transport_cart_box')) {
                $data = Session::get('transport_cart_box');
                $data[$transport_cart_key] = $transport_cart_box;
            } else {
                $data = [];
                $data[$transport_cart_key] = $transport_cart_box;
            }

            Session::put('transport_cart_box', $data);

        }

        if ((Session::has('transport_cart_box')) || (Input::has('vehicle_type'))) {
            return Response::json(Session::get('transport_cart_box'));
        } else {
            return null;
        }

    }

    // delete transport cart item

    public function transportCartItemDelete()
    {

        $deletable = Input::get('del_transport_id');

        if (Session::has('transport_cart_box')) {
            $data = Session::get('transport_cart_box');
            //dd($data);
            unset($data[$deletable]);

            if (!empty($data)) {
                Session::put('transport_cart_box', $data);
            } else {
                Session::forget('transport_cart_box');
                return null;
            }

        }

        return Response::json(Session::get('transport_cart_box'));

    }

    // Create transport map

    public function transportMapCreate()
    {

        $origin = Input::get('origin');
        $origin_longitude = City::where('id', $origin)->select('longitude')->first()->longitude;
        $origin_latitude = City::where('id', $origin)->select('latitude')->first()->latitude;

        if (Input::has('destination_1')) {
            $destination_1 = Input::get('destination_1');
            $destination_1_longitude = City::where('id', $destination_1)->select('longitude')->first()->longitude;
            $destination_1_latitude = City::where('id', $destination_1)->select('latitude')->first()->latitude;
        } else {
            $destination_1_longitude = '';
            $destination_1_latitude = '';
        }

        if (Input::has('destination_2')) {
            $destination_2 = Input::get('destination_2');
            $destination_2_longitude = City::where('id', $destination_2)->select('longitude')->first()->longitude;
            $destination_2_latitude = City::where('id', $destination_2)->select('latitude')->first()->latitude;

        } else {
            $destination_2_longitude = '';
            $destination_2_latitude = '';
        }

        if (Input::has('destination_3')) {
            $destination_3 = Input::get('destination_3');
            $destination_3_longitude = City::where('id', $destination_3)->select('longitude')->first()->longitude;
            $destination_3_latitude = City::where('id', $destination_3)->select('latitude')->first()->latitude;
        } else {
            $destination_3_longitude = '';
            $destination_3_latitude = '';
        }

        $lan_lot_arr = array(
            'origin_longitude' => $origin_longitude,
            'origin_latitude' => $origin_latitude,
            'destination_1_longitude' => $destination_1_longitude,
            'destination_1_latitude' => $destination_1_latitude,
            'destination_2_longitude' => $destination_2_longitude,
            'destination_2_latitude' => $destination_2_latitude,
            'destination_3_longitude' => $destination_3_longitude,
            'destination_3_latitude' => $destination_3_latitude,
        );

        $lan_lot_arr_full = array_slice($lan_lot_arr, 0);

        return Response::json($lan_lot_arr_full);
    }

    // search option

    public function viewSearch()
    {

        $package = Input::get('package');

        if ($package == 1) {

            if (Input::has('vehicle')) {
                $get_vehicle_id = Input::get('vehicle');
            }

            if (Input::get('predefined_method') == 1) {

                if (Input::has('from')) {
                    $get_from = Input::get('from');
                } else {
                    $get_from = '%';
                }

                if (Input::has('to')) {
                    $get_to = Input::get('to');
                } else {
                    $get_to = '%';
                }

                $get_days = '%';

            } else if (Input::get('predefined_method') == 2) {
                $get_from = '%';
                $get_to = '%';

                if (Input::has('days')) {
                    $get_days = Input::get('days');
                } else {
                    $get_days = '%';
                }

            } else {
                $get_from = '%';
                $get_to = '%';
                $get_days = '%';
            }


            return Redirect::route('transport-list',
                array(
                    'get_vehicle_id' => $get_vehicle_id,
                    'get_from' => $get_from,
                    'get_to' => $get_to,
                    'get_days' => $get_days,
                )
            );

        } else {

            if (Input::has('vehicle')) {
                $get_vehicle_id = Input::get('vehicle');
            }


            if (Input::has('vehicle_type')) {
                $get_vehicle_type_id = Input::get('vehicle_type');
            } else {
                $get_vehicle_type_id = '%';
            }

            if (Input::has('hours')) {
                if (Input::get('hours') == 1) {
                    $get_hours = 4;
                } else {
                    $get_hours = 8;
                }
            } else {
                $get_hours = '%';
            }

            return Redirect::route('wedding-packages',
                array(
                    'get_vehicle_id' => $get_vehicle_id,
                    'get_vehicle_type_id' => $get_vehicle_type_id,
                    'get_hours' => $get_hours,
                )
            );

        }

    }


}
