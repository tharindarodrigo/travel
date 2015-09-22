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
        return View::make('bookings.create');
    }

    /**
     * Store a newly created booking in storage.
     *
     * @return Response
     */
    public function store()
    {

//dd(Input::all());

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

            Mail::send('emails.bookings.booking', array(
                'data' => $data,
                'clients' => $clients
            ), function ($message) use ($user,$booking){
                $message->to($user->email,$user->first_name)->subject('Booking Created : '.$booking->reference_number);
            });

        };

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
            $booking = Booking::findOrFail($id);
            $clients = Client::where('booking_id', $id)->get();
            $flightDetails = FlightDetail::where('booking_id', $id)->get();
        } catch (ModelNotFoundException $e) {
            return Redirect::to('/404');
        }


        return View::make('bookings.show', compact('booking', 'clients', 'flightDetails'));
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
//        $data =array();

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
//        Session::forget('client-list');
        //dd('client-list');
        return Response::json(Session::get('client-list'));
    }

}
