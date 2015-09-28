<?php

class CartController extends \BaseController
{

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function getBookingCart()
    {

        $bookings = Session::get('rate_box_details');
        $hotel_bookings = [];
        $rate_keys = array_keys($bookings);

        foreach ($rate_keys as $rate_key) {
            $hotel_id = explode('_', $rate_key)[0];

            $hotel_bookings[$hotel_id][] = $bookings[$rate_key];
            $hotel_bookings[$hotel_id]['hotel_name'] = $bookings[$rate_key]['hotel_name'];
        }

//dd($hotel_bookings);

        return View::make('payments.booking_cart')
            ->with(compact('hotel_bookings'));

//        dd(Session::get('booking_cart'));

    }


    public function bookingCart()
    {

        if (Session::has('rate_box_details')) {

            $bookings = Session::get('rate_box_details');
            $hotel_bookings = [];

            $rate_keys = array_keys($bookings);
            $hotel_id_str = implode("_", $rate_keys);

            foreach ($rate_keys as $rate_key) {
                $hotel_id = explode('_', $rate_key)[0];

                if (strpos($hotel_id_str, $hotel_id) !== false) {

                    $hotel_bookings[$hotel_id][] = $bookings[$rate_key];
                    $hotel_bookings[$hotel_id]['hotel_name'] = $bookings[$rate_key]['hotel_name'];
                    $hotel_bookings[$hotel_id]['hotel_address'] = $bookings[$rate_key]['hotel_address'];
                    $hotel_bookings[$hotel_id]['room_identity'] = $bookings[$rate_key]['room_identity'];
                    Session::put('booking_cart', $hotel_bookings);
                    //dd($hotel_bookings);

                } else {

                    Session::put('booking_cart', Session::get('rate_box_details'));

                }

            }//Session::forget('booking_cart');
            //dd(Session::get('booking_cart'));

            $hotel_bookings = Session::get('booking_cart');

            return View::make('payments.booking_cart')
                ->with(compact('hotel_bookings'));
        }
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function cartItemDelete()
    {

        $deletable = Input::get('delete_item');

        if (Session::has('rate_box_details')) {
            $data = Session::get('rate_box_details');
            //dd($data);
            unset($data[$deletable]);

            Session::put('rate_box_details', $data);
        }

        return Redirect::to('/booking-cart');

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
     * @param  int $id
     * @return Response
     */
    public function show($id)
    {
        //
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  int $id
     * @return Response
     */
    public function update($id)
    {
        //
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }


}
