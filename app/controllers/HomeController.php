<?php

class HomeController extends BaseController
{

    /*
    |--------------------------------------------------------------------------
    | Default Home Controller
    |--------------------------------------------------------------------------
    |
    | You may wish to use controllers instead of, or in addition to, Closure
    | based routes. That's great! Here is an example controller method to
    | get you started. To route to this controller, just add the route:
    |
    |	Route::get('/', 'HomeController@showWelcome');
    |
    */

    public function index()
    {

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


        $tour = Tour::take(3)->get();
        $excursion = ExcursionType::take(3)->get();
        $user_review = HotelReview::take(3)->get();

        return View::make('index')
            ->with(
                array(
                    'tour' => $tour,
                    'excursion' => $excursion,
                    'user_review' => $user_review,
                    'st_date' => $st_date,
                    'ed_date' => $ed_date,

                )
            );
    }

    public function message()
    {
        return View::make('pages.message');
    }

    /*
 *no result page
 */
    public function view403()
    {
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
        $hotel_type = DB::table('hotel_categories')->get();
        $hotel_cities = DB::table('cities')->get();
        $hotel_facilities = DB::table('hotel_facilities')->get();

        return View::make('errors.403')
            ->with(
                array(
                    'hotel_type' => $hotel_type,
                    'hotel_cities' => $hotel_cities,
                    'hotel_facilities' => $hotel_facilities,
                    'st_date' => $st_date,
                    'ed_date' => $ed_date,
                )
            );
    }


}
