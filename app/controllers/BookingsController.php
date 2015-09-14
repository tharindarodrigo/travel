<?php

class BookingsController extends \BaseController {

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

//        dd(Input::all());
		$validator = Validator::make($data = Input::all(), Booking::$rules);

		if ($validator->fails())
		{
            dd($validator->errors());
			return Redirect::back()->withErrors($validator)->withInput();
		}

        $data['user_id'] = Auth::user()->id;
        $data['val'] = 1;

		if($booking = Booking::create($data)){
            if(Session::has('client-list')){
                $clients = Session::pull('client-list');
//                dd($clients);
                //dd($booking->id);
                foreach($clients as $client){
                    $client['booking_id'] = $booking->id;
                    $client['gender'] === 'male' ? $client['gender'] =1 : $client['gender'] =0;
                    Client::create($client);
                }
            }

            $data['booking_id'] = $booking->id;

            FlightDetail::create($data);

        };

		return Redirect::route('bookings.index');
	}

	/**
	 * Display the specified booking.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$booking = Booking::findOrFail($id);
        $clients = Client::where('booking_id',$id)->get();
        $flightDetails = FlightDetail::where('booking_id',$id)->get();

		return View::make('bookings.show', compact('booking','clients','flightDetails'));
	}

	/**
	 * Show the form for editing the specified booking.
	 *
	 * @param  int  $id
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
	 * @param  int  $id
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
		if ($validator->fails())
		{

            return Redirect::back()->withErrors($validator)->withInput();
		}

		$booking->update($data);

		return Redirect::route('bookings.index');
	}

	/**
	 * Remove the specified booking from storage.
	 *
	 * @param  int  $id
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

        if(Session::has('client-list')){
            $data = Session::get('client-list');
            $data[] = $input;
            Session::put('client-list', $data);

        } else {
            $data= [];
            $data[] = $input;
            Session::put('client-list', $data);
        }

        return Response::json(Session::get('client-list'));
    }

    public function destroyClient()
    {
        $deletable = Input::get('deletable');

        if(Session::has('client-list')){
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
