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

        // filtering
        $vehicles = Vehicle::get();


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

//dd($min_rate.'/'.$max_rate);

        $transport_packages = Transportpackage::WhereHas('Vehicle', function ($r) use ($vehicle_id) {
            $r->whereIn('id', $vehicle_id);
        })
            ->where('rate', '>=', $min_rate)
            ->where('rate', '<=', $max_rate)
            ->paginate(9);


        return View::make('transport.transport_list')
            ->with(
                array(
                    'transport_packages' => $transport_packages,
                    'min_trans_rate' => $min_trans_rate,
                    'max_trans_rate' => $max_trans_rate,
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

        $city = City::lists('city');
        $vehicle = Vehicle::lists('vehicle_type');

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


    public function viewSearch()
    {


        return View::make('transportpackages.create');

    }


}
