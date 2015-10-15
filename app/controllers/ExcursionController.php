<?php

/**
 * Created by PhpStorm.
 * User: thilina
 * Date: 2015-08-06
 * Time: 5:19 PM
 */
class ExcursionController extends \BaseController
{

    /*
     excursion list page
    */

    public function viewExcursionList($excursion_type_name)
    {
        $x = 0;
        $path = array();

        $grid_url = 'tour/sri-lanka/grid/view/' . $excursion_type_name;
        $list_url = 'tour/sri-lanka/' . $excursion_type_name;


        if (Session::has('st_date')) {
            $st_date = Session::get('st_date');
        } else {
            $st_date = date("Y/m/d");
        }

        //Session::flush();

        if (Session::has('ed_date')) {
            $ed_date = Session::get('ed_date');
        } else {
            $ed_date = date("Y/m/d", strtotime($st_date . ' + 2 days'));
        }

        // Filtering
        $filter_excursion = ExcursionType::get();
        $filter_cities = City::get();


        if (!empty($excursion_type_name)) {
            $get_excursion_type_name = str_replace('-', ' ', $excursion_type_name);
            $get_excursion_type_id = DB::table('excursion_types')->where('excursion_type', 'LIKE', $get_excursion_type_name)->first();
            $excursion_type_id = $get_excursion_type_id->id;
        }


        if (!empty($excursion_type_id)) {
            $excursions = Excursion::where('excursion_type_id', '=', $excursion_type_id)
                ->paginate(6);
        }


        if (!$excursions->count()) {
            return Redirect::to('/403');
        }

        return
            array(

                'excursions' => $excursions,
                'grid_url' => $grid_url,
                'list_url' => $list_url,
                'excursion_type_id' => $excursion_type_id,
                'st_date' => $st_date,
                'ed_date' => $ed_date,
                'filter_excursion' => $filter_excursion,
                'filter_cities' => $filter_cities,

            );

    }


    /*
     Hotel list page redirect page
    */

    public function excursionList($excursion_name = '')
    {
        Session::put('excursion_view', 1);

        try {
            $tour_results = $this->viewExcursionList($excursion_name);
            return View::make('excursion.excursion_list')
                ->with($tour_results);
        } catch (Exception $e) {
            $no_result = $this->viewNoResult();
            return View::make('hotel.no_results')
                ->with($no_result);
        }
    }

    /*
     *no result page
     */
    public function viewNoResult()
    {

        // Filtering
        $filter_excursion = Tour::get();
        $filter_cities = City::get();

        return
            array(
                'filter_excursion' => $filter_excursion,
                'filter_cities' => $filter_cities,
            );
    }


    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function excursionDetail($country = '', $excursion_type = '', $excursion = '')
    {

        $x = 0;

        if (!empty($country)) {
            $country = str_replace('-', ' ', $country);
            $get_country_id = DB::table('countries')->where('country', 'LIKE', $country)->first();
            $country_id = $get_country_id->id;
        }

        if (!empty($excursion_type)) {
            $excursion_type = str_replace('-', ' ', $excursion_type);
            $get_excursion_type_id = DB::table('excursion_types')->where('excursion_type', 'LIKE', $excursion_type)->first();
            $excursion_type_id = $get_excursion_type_id->id;
        }

        if (!empty($excursion)) {
            $excursion = str_replace('-', ' ', $excursion);
            $get_excursion_id = DB::table('excursions')->where('excursion', 'LIKE', $excursion)->first();
            $excursion_id = $get_excursion_id->id;
        }

        $transport_type = ExcursionTransportType::where('excursion_type_id', '=', $excursion_type_id)->lists('transport_type', 'id');

        $path = array();

        $directory = 'public/images/excursion_images/excursion_types/';

        $images = glob($directory . $excursion_id . "_" . "*.*");

        foreach ($images as $image) {

            $path[] = $image;
        }

        $excursion = Excursion::where('id', '=', $excursion_id)->first();

        $excursion_type = ExcursionType::where('id', '=', $excursion_type_id)->first();

        $excursion_rate = ExcursionRate::where('excursion_id', '=', $excursion_id)->get();

//        dd(DB::getQueryLog());

        if (!$excursion->count()) {
            return Redirect::to('/403');
        }

        return View::make('excursion.excursion_details')
            ->with(
                array(

                    'x' => $x,
                    'excursion' => $excursion,
                    'excursion_id' => $excursion_id,
                    'excursion_type_id' => $excursion_type_id,
                    'path' => $path,
                    'excursion_type' => $excursion_type,
                    'transport_type' => $transport_type,
                    'excursion_rate' => $excursion_rate,

                )
            );
    }

    public function viewFilter()
    {

        if (Input::has('excursion')) {
            $get_excursion = Input::get('excursion');

            $get_excursion_name = DB::table('excursion_types')->where('id', '=', $get_excursion)->first();
            $excursion_name = $get_excursion_name->excursion_type;
            $excursion = str_replace(' ', '-', $excursion_name);

            $url = 'excursion/sri-lanka/' . $excursion;
            return Redirect::to($url);
        }

    }

    public function excursionSetTransport()
    {

        $transport_id = Input::get('transport_type');
        $excursion = Input::get('ex_id');
        $city_id = Input::get('hidden_ex_city_id');

        $get_excursion_rate = ExcursionRate::where('excursion_id', '=', $excursion)
            ->where('excursion_transport_type_id', '=', $transport_id)
            ->where('city_id', '=', $city_id)
            ->select('rate')
            ->first();

        $ex_rate = $get_excursion_rate->rate;

        return Response::json($ex_rate);

    }

    public function excursionGetTotal()
    {

        $total_rate = 0;
        $price_details = array();

        $price_box_transport_id = Input::get('price_box_transport_id');
        $price_box_ex_id = Input::get('price_box_ex_id');
        $price_box_city_id = Input::get('price_box_city_id');
        $pax = Input::get('price_box_pax');

        $city = City::where('id', $price_box_city_id)->first()->city;
        $transport_type = ExcursionTransportType::where('id', $price_box_transport_id)->first()->transport_type;

        $get_excursion_price = ExcursionRate::where('excursion_id', '=', $price_box_ex_id)
            ->where('excursion_transport_type_id', '=', $price_box_transport_id)
            ->where('city_id', '=', $price_box_city_id)
            ->select('rate')
            ->first();

        $ex_rate = $get_excursion_price->rate;

        $total_rate = $ex_rate * $pax;

        $price_details = array(
            'city' => $city,
            'transport_type' => $transport_type,
            'pax' => $pax,
            'ex_rate' => $ex_rate,
            'total_rate' => $total_rate,
        );

        return Response::json($price_details);

    }


}