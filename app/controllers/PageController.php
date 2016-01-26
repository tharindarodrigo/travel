<?php

class pageController extends \BaseController
{

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */

    public function tourismInSrilanka()
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

        $filter_tours = Tour::get();
        $filter_cities = City::get();


        $path = array();

//        dd(DB::getQueryLog());

        return View::make('pages.tourism_in_srilanka')
            ->with(
                array(
                    'path' => $path,
                    'st_date' => $st_date,
                    'ed_date' => $ed_date,
                    'filter_tours' => $filter_tours,
                    'filter_cities' => $filter_cities,

                )
            );
    }

    public function srilankaAdvance()
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

        $filter_tours = Tour::get();
        $filter_cities = City::get();


        $path = array();

//        dd(DB::getQueryLog());

        return View::make('pages.srilankan_advice')
            ->with(
                array(


                    'path' => $path,
                    'st_date' => $st_date,
                    'ed_date' => $ed_date,
                    'filter_tours' => $filter_tours,
                    'filter_cities' => $filter_cities,

                )
            );
    }

    public function aboutSrilanka()
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

        $filter_tours = Tour::get();
        $filter_cities = City::get();


        $path = array();

//        dd(DB::getQueryLog());

        return View::make('pages.about_srilanka')
            ->with(
                array(


                    'path' => $path,
                    'st_date' => $st_date,
                    'ed_date' => $ed_date,
                    'filter_tours' => $filter_tours,
                    'filter_cities' => $filter_cities,

                )
            );
    }

    public function faq()
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

        $filter_tours = Tour::get();
        $filter_cities = City::get();


        $path = array();

//        dd(DB::getQueryLog());

        return View::make('pages.faq')
            ->with(
                array(


                    'path' => $path,
                    'st_date' => $st_date,
                    'ed_date' => $ed_date,
                    'filter_tours' => $filter_tours,
                    'filter_cities' => $filter_cities,

                )
            );
    }

    public function termsAndConditions()
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

        $filter_tours = Tour::get();
        $filter_cities = City::get();


        $path = array();

//        dd(DB::getQueryLog());

        return View::make('pages.terms_and_conditions')
            ->with(
                array(


                    'path' => $path,
                    'st_date' => $st_date,
                    'ed_date' => $ed_date,
                    'filter_tours' => $filter_tours,
                    'filter_cities' => $filter_cities,

                )
            );
    }

    public function privacyAndPolicy()
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

        $filter_tours = Tour::get();
        $filter_cities = City::get();


        $path = array();

//        dd(DB::getQueryLog());

        return View::make('pages.privacy_policy')
            ->with(
                array(
                    'path' => $path,
                    'st_date' => $st_date,
                    'ed_date' => $ed_date,
                    'filter_tours' => $filter_tours,
                    'filter_cities' => $filter_cities,

                )
            );
    }

    public function pageLink()
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


        return View::make('pages.page_link')
            ->with(
                array(
                    'st_date' => $st_date,
                    'ed_date' => $ed_date,

                )
            );
    }


    public function getpayOnline()
    {
        //dd('ssaa');
        return View::make('pages.pay_online');

    }

    public function PayOnline()
    {

        $validator = Validator::make(Input::all(),

            array(
                'name' => 'required',
                'email' => 'required|email',
                'phone' => 'required|numeric',
                'amount' => 'required|numeric',
            )
        );

        if ($validator->fails()) {

            //Redirect to the sign in page
            return Redirect::back()
                ->withErrors($validator)
                ->withInput();

        } else {

            $remember = (Input::has('remember')) ? true : false;

            $name = Input::get('name');
            $email = Input::get('email');
            $phone = Input::get('phone');
            $amount = Input::get('amount');


            $data = array(
                'details' => $name,
                'ip_address' => $_SERVER['REMOTE_ADDR'],
                //'reference_number' => $reference_number,
                'amount' => $amount,
                'payment_status' => 0,
                'my_booking' => 2,
            );
            $reserv_id = Payment::create($data);

            $data_tab_HSBC_payment = array(
                'currency' => 'USD',
                // 'reference_number' => $reference_number,
            );
            $tab_HSBC_payment_id = HsbcPayment::create($data_tab_HSBC_payment);


            $stamp = strtotime("now");

            $payment_id = Payment::orderBy('created_at', 'desc')->first()->id;
            $orderid = "$stamp" . 'A' . "$payment_id";
            $last_res_resid = str_replace(".", "", $orderid);

            $hsbc_id = HsbcPayment::orderBy('created_at', 'desc')->first()->id;
            $hsbc_payment_id_pre = "$stamp" . 'HSBC' . "$hsbc_id";
            $hsbc_payment_id = str_replace(".", "", $hsbc_payment_id_pre);


            if ($last_res_resid) {

                $payment = DB::table('payments')
                    ->where('id', $payment_id)
                    ->update(
                        array(
                            'reference_number' => $last_res_resid,
                            'HSBC_payment_id' => $hsbc_payment_id
                        )
                    );


                $data_tab_HSBC_payment = DB::table('hsbc_payments')
                    ->where('id', $hsbc_id)
                    ->update(
                        array(
                            'HSBC_payment_id' => $hsbc_payment_id
                        )
                    );

                $client = array(
                    'booking_name' => $name,
                    'email' => $email,
                    'phone' => $phone,
                    'val' => 0,
                    'payment_reference_number' => $last_res_resid
                );
                $client_payment_id = Booking::create($client);

            }


            $currency = 'USD';
            $total_price_all_hsbc = $amount * 100;

//        dd($hsbc_payment_id . '/' . $currency . '/' . $total_price_all_hsbc . '/' . $last_res_resid);

            HsbcPayment::goto_hsbc_gateway($hsbc_payment_id, $currency, $total_price_all_hsbc, $last_res_resid);

            //  return $this->storeAllDataAndSendEmails();

        }

    }

    public function storeAllDataAndSendEmails()
    {

        dd('done');

    }


}
