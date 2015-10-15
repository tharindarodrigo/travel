<?php

use Illuminate\Database\Eloquent\ModelNotFoundException;


class BookingsController extends \BaseController
{

    /**
     * Display a listing of bookings
     *
     * @return Response
     */
    public function index()
    {
        $bookings = Booking::all();

        return View::make('bookings.index', compact('bookings'));
    }

    /**
     * Show the form for creating a new booking
     *
     * @return Response
     */
    public function create()
    {

        if (Session::has('rate_box_details') || Session::has('transport_cart_box'))
            return View::make('bookings.create');
        return Redirect::to('/');

    }

    /**
     * Store a newly created booking in storage.
     * This includes Clients, FlightDetails
     *
     * @return Response
     */
    public function store()
    {

        $user = Auth::user();

        $validator = Validator::make($data = Input::all(), Booking::$rules);

        if ($validator->fails()) {
            return Redirect::back()->withErrors($validator)->withInput();
        }

        if (!Session::has('client-list')) {
            return Redirect::back();
        }

        $data['user_id'] = Auth::user()->id;
        $data['val'] = 1;
        $data['reference_number'] = 123456789;
        $clients = null;

        if (Session::has('rate_box_details') || Session::has('transport_cart_box')) {

            if ($booking = Booking::create($data)) {
                if (Session::has('client-list')) {
                    $clients = Session::pull('client-list');
                    //dd($clients);
                    //dd($booking->id);
                    foreach ($clients as $client) {
                        $client['booking_id'] = $booking->id;
                        $client['gender'] === 'male' ? $client['gender'] = 1 : $client['gender'] = 0;
                        Client::create($client);
                    }
                }
                $flight_data = [];
                $flight_data['booking_id'] = $booking->id;
                //dd($flight_data['booking_id']);

                //arrival flight data

                $flight_data['date'] = $data['date_arrival'];
                $flight_data['time'] = $data['arrival_time'];
                $flight_data['flight'] = $data['arrival_flight'];
                $flight_data['flight_type'] = 1;

                FlightDetail::create($flight_data);

                //departure flight data
                $flight_data['date'] = $data['date_departure'];
                $flight_data['time'] = $data['departure_time'];
                $flight_data['flight'] = $data['departure_flight'];
                $flight_data['flight_type'] = 0;

                FlightDetail::create($flight_data);


                //transport - custom trips

                if(Session::has('transport_cart_box')) {
                    $custom_trip = Session::pull('transport_cart_box');
                    $custom_trip['from'] = $custom_trip['pick_up_date'].' '.$custom_trip['pick_up_time_hour'].':'.$custom_trip['pick_up_time_minutes'];
                    $custom_trip['to'] = $custom_trip['drop_off_date'].' '.$custom_trip['drop_off_time_hour'].':'.$custom_trip['drop_off_time_minute'];
                    $custom_trip['reference_number'] = 'TR011000';
                    CustomTrip::create($custom_trip);
                }

                //hotel bookings

                if(Session::has('rate_box_details')){
                    $bookings = Session::pull('rate_box_details');

                    $vouchers = Voucher::arrangeHotelBookingsVoucherwise($bookings,$booking->id);

                    foreach($vouchers as $voucher){
                        $create_voucher = Voucher::create($voucher);

                        for($c=0; $c<count($voucher)-6; $c++){

                            $voucher[$c]['voucher_id'] = $create_voucher->id;
                            $voucher[$c]['amount'] = $voucher[$c]['room_cost'];
                            RoomBooking::create($voucher[$c]);
                        }
                    }
                }








                Mail::send('emails.bookings.booking', array(
                    'data' => Booking::getBookingData($booking->id)
                ), function ($message) use ($user, $booking) {

                    $message->to('tharindarodrigo@gmail.com', $user->first_name)->subject('Booking Created : ' . $booking->reference_number);
                });

            }

        } else {
            return Redirect::back();
        }


        return Redirect::route('bookings.index');
    }

    /**
     * Display the specified booking.
     *
     * @param  int $id
     * @return Response
     */
    public function show($id)
    {
        try {
            $booking = Booking::with('voucher')->with('client')->with('flightDetail')->where('id', $id)->first();

        } catch (ModelNotFoundException $e) {
            return Redirect::to('/404');
        }


        return View::make('bookings.show', compact('booking', 'clients', 'flightDetails', 'vouchers'));
    }

    /**
     * Show the form for editing the specified booking.
     *
     * @param  int $id
     * @return Response
     */
    public function edit($id)
    {
        $booking = Booking::find($id);

        return View::make('bookings.edit', compact('booking'));
    }

    /**
     * Update the specified booking in storage.
     *
     * @param  int $id
     * @return Response
     */
    public function update($id)
    {

        $booking = Booking::findOrFail($id);

        if (!Input::has('val')) {
            $rules = Booking::$rules;
        } else {
            $rules = ['val'];
        }

        $validator = Validator::make($data = Input::all(), $rules);
        if ($validator->fails()) {

            return Redirect::back()->withErrors($validator)->withInput();
        }

        $booking->update($data);

        return Redirect::route('bookings.index');
    }

    /**
     * Remove the specified booking from storage.
     *
     * @param  int $id
     * @return Response
     */
    public function destroy($id)
    {
        Booking::destroy($id);

        return Redirect::route('bookings.index');
    }

    /**
     * Client-List Functions
     */


    public function addClient()
    {
        $input = Input::all();

        if (Session::has('client-list')) {
            $data = Session::get('client-list');
            $data[] = $input;
            Session::put('client-list', $data);

        } else {
            $data = [];
            $data[] = $input;
            Session::put('client-list', $data);
        }

        return Response::json(Session::get('client-list'));
    }

    public function destroyClient()
    {
        $deletable = Input::get('deletable');

        if (Session::has('client-list')) {
            $data = Session::get('client-list');
            unset($data[$deletable]);

            Session::put('client-list', $data);
        }

        return Response::json(Session::get('client-list'));
    }

    public function getClientList()
    {

        return Response::json(Session::get('client-list'));
    }

    public function cancelBooking()
    {
        Session::forget('add_new_voucher');
        Session::forget('rate_box_details');
        Session::forget('transport_cart_box');
        Session::forget('');
        return Redirect::to('/');
    }

}
