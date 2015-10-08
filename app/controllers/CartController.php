<?php

class CartController extends \BaseController
{

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function bookingCart()
    {

        if (Session::has('rate_box_details') || Session::has('transport_cart_box')) {
            $bookings = Session::get('rate_box_details');
            $hotel_bookings = [];
            $rate_keys = array_keys($bookings);

            foreach ($rate_keys as $rate_key) {
                $hotel_id = explode('_', $rate_key)[2];

                $hotel_bookings[$hotel_id][] = $bookings[$rate_key];
                $hotel_bookings[$hotel_id]['hotel_name'] = $bookings[$rate_key]['hotel_name'];
                $hotel_bookings[$hotel_id]['hotel_address'] = $bookings[$rate_key]['hotel_address'];
                $hotel_bookings[$hotel_id]['room_identity'] = $bookings[$rate_key]['room_identity'];
            }
        } else {
            return Redirect::to('/403');
        }

//dd($hotel_bookings);

        if (Session::has('transport_cart_box') || Session::has('rate_box_details')) {
            $transport_bookings = Session::get('transport_cart_box');
        } else {
            return Redirect::to('/403');
        }


        return View::make('payments.booking_cart')
            ->with(
                array(
                    'hotel_bookings' => $hotel_bookings,
                    'transport_bookings' => $transport_bookings,
                )
            );

    }


    public function bookingCart1()
    {

        if (Session::has('rate_box_details')) {

            $bookings = Session::get('rate_box_details');
            $hotel_bookings = [];

            $rate_keys = array_keys($bookings);
            $hotel_id_str = implode("_", $rate_keys);

            foreach ($rate_keys as $rate_key) {
                $hotel_id = explode('_', $rate_key)[2];

                if (strpos($hotel_id_str, $hotel_id) !== false) {

                    $hotel_bookings[$hotel_id][] = $bookings[$rate_key];
                    $hotel_bookings[$hotel_id]['hotel_name'] = $bookings[$rate_key]['hotel_name'];
                    $hotel_bookings[$hotel_id]['hotel_address'] = $bookings[$rate_key]['hotel_address'];
                    $hotel_bookings[$hotel_id]['hotel_id'] = $bookings[$rate_key]['hotel_id'];
                    Session::put('booking_cart', $hotel_bookings);
                    //dd($hotel_bookings);
                } else {
                    Session::put('booking_cart', Session::get('rate_box_details'));
                }

            }

            //Session::forget('booking_cart');
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

        $hotel_id = explode('_', $deletable)[2];

        $bookings = Session::get('rate_box_details');
        $rate_keys = array_keys($bookings);

        for ($a = 0; $a < count($rate_keys); $a++) {

            $get_element_hotel_id = $rate_keys[$a];
            $element_hotel_id = explode('_', $get_element_hotel_id)[2];

            if ($element_hotel_id == $hotel_id) {

                if (Session::has('rate_box_details')) {
                    $data = Session::get('rate_box_details');
                    //dd($data);
                    //dd($data[$deletable]);
                    // dd($data[$hotel_id]);
                    unset($data[$get_element_hotel_id]);

                    if (!empty($data)) {
                        Session::put('rate_box_details', $data);
                    } else {
                        Session::forget('rate_box_details');
                    }
                }

            }

        }

        return Redirect::to('/booking-cart');

    }


    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function singleCartItemDelete()
    {

        $deletable = Input::get('delete_single_item');

        if (Session::has('rate_box_details')) {
            $data = Session::get('rate_box_details');
            //dd($data[$deletable]);
            // dd($data[$hotel_id]);
            unset($data[$deletable]);

            if (!empty($data)) {
                Session::put('rate_box_details', $data);
            } else {
                Session::forget('rate_box_details');
            }
        }

        return Redirect::to('/booking-cart');

    }


    public function transportCartDelete()
    {

        $deletable = Input::get('delete_transport_item');

        if (Session::has('transport_cart_box')) {
            $data = Session::get('transport_cart_box');
            //dd($data[$deletable]);
            // dd($data[$hotel_id]);
            unset($data[$deletable]);

            if (!empty($data)) {
                Session::put('transport_cart_box', $data);
            } else {
                Session::forget('transport_cart_box');
            }

        }

        return Redirect::to('/booking-cart');

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
