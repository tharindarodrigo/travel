<?php

use Illuminate\Database\Eloquent\ModelNotFoundException;


class BookingsController extends \BaseController
{

    private $_user;

    public function __construct()
    {
        $this->_user = Auth::user();
//        $this->beforeFilter('agent', array('except' => 'create'));
    }

    /**
     * Display a listing of bookings
     *
     * @return Response
     */
    public function index()
    {
        if (Auth::check()) {

            $reference_number = Input::has('reference_number') ? Input::get('reference_number') : '%';
//        $arrival_date = Input::get('arrival_date') or '%';
//        $departure_date = Input::get('departure_date') or '%';
//        $reference_number = 0000000;
            if (Entrust::hasRole('Admin')) {
                $bookings = Booking::with('user')
                    ->where('reference_number', 'like', '%' . $reference_number . '%')
//                ->where('arrival_date', '=', $arrival_date)
//                ->where('departure_date', '=', $departure_date)
                    ->get();
            } else {
                $bookings = Booking::whereHas('user', function ($q) {
                    $q->where('users.id', $this->_user->id);
                })->where('reference_number', 'like', $reference_number)
//                ->where('arrival_date', '=', $arrival_date)
//                ->where('departure_date', '=', $departure_date)
                    ->get();
            }
            return View::make('bookings.index', compact('bookings'));
        }

        App::abort(404);
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

        if (Auth::check()) {
            $user = Auth::user();
            $data['user_id'] = $user->id;
            $rules = Booking::$rules;
        } else {
            $rules = Booking::$guestRules;
        }

        $validator = Validator::make($data = Input::all(), $rules);

        if ($validator->fails()) {
            return Redirect::back()->withErrors($validator)->withInput();
        }

//        if (!Session::has('client-list')) {
//            return Redirect::back();
//        }


        $data['val'] = 1;
        $data['reference_number'] = 123456789;
        $clients = null;

        if (Session::has('rate_box_details') || Session::has('transport_cart_box')) {

            if ($booking = Booking::create($data)) {


                if (Auth::check()) {
                    DB::table('booking_user')->insert(array('booking_id' => $booking->id, 'user_id' => $user->id));
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
                }


                /**
                 *  transport - custom trips
                 */

                if (Session::has('transport_cart_box')) {
                    $custom_trip = Session::pull('transport_cart_box');
                    $custom_trip['from'] = $custom_trip['pick_up_date'] . ' ' . $custom_trip['pick_up_time_hour'] . ':' . $custom_trip['pick_up_time_minutes'];
                    $custom_trip['to'] = $custom_trip['drop_off_date'] . ' ' . $custom_trip['drop_off_time_hour'] . ':' . $custom_trip['drop_off_time_minute'];
                    $custom_trip['reference_number'] = 'TR011000';
                    CustomTrip::create($custom_trip);
                }

                /**
                 *  hotel bookings
                 */

                if (Session::has('rate_box_details')) {
                    $bookings = Session::pull('rate_box_details');

                    $vouchers = Voucher::arrangeHotelBookingsVoucherwise($bookings, $booking->id);

                    foreach ($vouchers as $voucher) {
                        $created_voucher = Voucher::create($voucher);

                        for ($c = 0; $c < count($voucher) - 6; $c++) {

                            $voucher[$c]['voucher_id'] = $created_voucher->id;

                            $RoomBooking = RoomBooking::create($voucher[$c]);

                        }

                        // voucher
                        $pdf = PDF::loadView('emails/voucher', array('voucher' => $created_voucher));
                        $pdf->save(public_path() . '/temp-files/voucher.pdf');

                        $hotel_users = DB::table('users')->leftJoin('hotel_user', 'users.id', '=', 'hotel_user.user_id')
                            ->where('hotel_user.hotel_id', $created_voucher->hotel_id)
                            ->get();


                        Mail::send('emails/voucher-mail', array(
                            'voucher' => Voucher::find($created_voucher->id)
                        ), function ($message) use ($booking, $hotel_users) {
                            $message->attach(public_path() . '/temp-files/voucher.pdf');
                            if(!empty($hotel_users))
                            foreach ($hotel_users as $hotel_user) {
                                $message->to($hotel_user->email, $hotel_user->first_name)
                                    ->subject('Booking Voucher : ' . $booking->reference_number);
                            }

                        });

                    }
                }

                //Booking details

                $pdf = PDF::loadView('emails/booking', array('booking' => $booking));
                $pdf->save(public_path() . '/temp-files/booking.pdf');

                $emails = array('tharinda@exotic-intl.com', 'lahiru@exotic-intl.com', 'umesh@exotic-intl.com');

                Mail::send('emails/booking-mail', array(
                    'booking' => Booking::getBookingData($booking->id)
                ), function ($message) use ($booking, $emails) {
                    $message->attach(public_path() . '/temp-files/booking.pdf');
                    foreach ($emails as $emailaddress) {
                        $message->to($emailaddress, 'Admin')
                            ->subject('Booking Created : ' . $booking->reference_number);
                    }
                });

                //Invoice
                $pdf = PDF::loadView('emails/invoice', array('booking' => $booking));
                $pdf->save(public_path() . '/temp-files/invoice.pdf');

                if ($user = $booking->user->first()) {
                    Mail::send('emails/invoice-mail', array(
                        'booking' => Booking::getBookingData($booking->id)
                    ), function ($message) use ($user, $booking, $emails) {
                        $message->to($user->email, $user->first_name . ' ' . $user->last_name)
                            ->subject('Booking Created : ' . $booking->reference_number)
                            ->attach(public_path() . '/temp-files/invoice.pdf');
                    });
                } else {
                    Mail::send('emails/invoice-mail', array(
                        'booking' => Booking::getBookingData($booking->id)
                    ), function ($message) use ($booking, $emails) {
                        $message->to($booking->email, $booking->name)
                            ->subject('Booking Created : ' . $booking->reference_number)
                            ->attach(public_path() . '/temp-files/invoice.pdf');
                    });
                }

                Session::put('sent_emails', 'Emails have been sent to the Respective parties');

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

        return Redirect::back();
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
