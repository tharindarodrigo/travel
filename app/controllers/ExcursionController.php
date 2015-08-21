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


        $path = array();

        $excursion = Excursion::where('id', '=', $excursion_id)->first();

        $excursion_type = ExcursionType::where('id', '=', $excursion_type_id)->first();

//        dd(DB::getQueryLog());

        if (!$excursion->count()) {
            return Redirect::to('/403');
        }

        return View::make('excursion.excursion_details')
            ->with(
                array(

                    'excursion' => $excursion,
                    'excursion_id' => $excursion_id,
                    'excursion_type_id' => $excursion_type_id,
                    'path' => $path,
                    'excursion_type' => $excursion_type,

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

}