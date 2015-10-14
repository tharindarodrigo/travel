<?php

class TransportPackageController extends \BaseController
{

    /**
     * Display a listing of transportpackages
     *
     * @return Response
     */
    public function transportList()
    {

        $vehicle_id = array();

        $vehicles = Vehicle::get();

        // filtering
        $vehicle = Vehicle::lists('vehicle_type', 'id');
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

        if (Input::has('vehicle')) {
            $get_vehicle = Input::get('vehicle');

            $vehicle_id[] = $get_vehicle;
        } else {
            $get_vehicle_ids = Vehicle::select('id')->get();

            foreach ($get_vehicle_ids as $get_vehicle_id) {
                $vehicle_id[] = $get_vehicle_id->id;
            }
        }

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

            $min_trans_rate = Transportpackage::min('rate');
            $max_trans_rate = Transportpackage::max('rate');
        }

        if (Input::has('from')) {
            $from = Input::get('from');
        } else {
            $from = '%';
        }

        if (Input::has('from')) {
            $to = Input::get('to');
        } else {
            $to = '%';
        }

        if (Input::has('transport_days')) {
            $days = Input::get('transport_days');
        } else {
            $days = '%';
        }

//dd($min_rate.'/'.$max_rate);

        $transport_packages = Transportpackage::WhereHas('Vehicle', function ($r) use ($vehicle_id) {
            $r->whereIn('id', $vehicle_id);
        })
            ->where('rate', '>=', $min_rate)
            ->where('rate', '<=', $max_rate)
            ->where('origin', 'LIKE', $from)
            ->where('destination', 'LIKE', $to)
            ->where('days', 'LIKE', $days)
            ->paginate(9);


        return View::make('transport.transport_list')
            ->with(
                array(
                    'transport_packages' => $transport_packages,
                    'min_trans_rate' => $min_trans_rate,
                    'max_trans_rate' => $max_trans_rate,
                    'vehicle' => $vehicle,
                    'city' => $city,
                    'vehicles' => $vehicles,
                    'st_date' => $st_date,
                    'ed_date' => $ed_date,
                )
            );
    }

    /**
     * Show the search for transportpackage
     *
     * @return Response
     */
    public function createMyTrip()
    {

        $city = City::lists('city', 'id');
        $vehicle = Vehicle::lists('vehicle_type', 'id');

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

        if (Input::has('pick_up_date')) {
            $pick_up_date = date("y-m-d", strtotime(Input::get('pick_up_date')));
        }

        if (Input::has('drop_off_date')) {
            $drop_off_date = date("y-m-d", strtotime(Input::get('drop_off_date')));
        }


        $vehicle_type = Input::get('vehicle_type');
        $vehicle = Vehicle::where('vehicle_type', $vehicle_type)->first();
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
        $total_distance = Input::get('total_distance');
        $transport_cart_key = $vehicle->id . '_' . $origin_id . '_' . $destination_1_id;

        $cost = $vehicle->rate * ($total_distance / 1000.0);
        $transport_cart_box = array(
            'vehicle_type' => $vehicle_type,
            'vehicle_id' => $vehicle->id,
            'origin' => $origin,
            'destination_1' => $destination_1,
            'destination_2' => $destination_2,
            'destination_3' => $destination_3,
            'pick_up_date' => $pick_up_date,
            'pick_up_time_hour' => $pick_up_time_hour,
            'pick_up_time_minutes' => $pick_up_time_minutes,
            'drop_off_date' => $drop_off_date,
            'drop_off_time_hour' => $drop_off_time_hour,
            'drop_off_time_minutes' => $drop_off_time_minutes,
            'transport_cart_key' => $transport_cart_key,
            'cost' => number_format($cost, 2),
            'amount' => $cost

        );


        if (Session::has('transport_cart_box')) {
            $data = Session::get('transport_cart_box');
            $data[$transport_cart_key] = $transport_cart_box;
        } else {
            $data = [];
            $data[$transport_cart_key] = $transport_cart_box;
        }

        Session::put('transport_cart_box', $data);

        return Response::json(Session::get('transport_cart_box'));

    }

    // delete transport cart item

    public function transportCartItemDelete()
    {

        $deletable = Input::get('del_transport_id');

        if (Session::has('transport_cart_box')) {
            $data = Session::get('transport_cart_box');
            //dd($data);
            unset($data[$deletable]);

            Session::put('transport_cart_box', $data);
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

    public function viewSearch()
    {
        return View::make('transportpackages.create');

    }


}
