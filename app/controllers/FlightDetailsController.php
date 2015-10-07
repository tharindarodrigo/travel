<?php

class FlightDetailsController extends \BaseController {

	/**
	 * Display a listing of flightdetails
	 *
	 * @return Response
	 */
	public function index()
	{
		$flightdetails = Flightdetail::all();

		return View::make('flightdetails.index', compact('flightdetails'));
	}

	/**
	 * Show the form for creating a new flightdetail
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('flightdetails.create');
	}

	/**
	 * Store a newly created flightdetail in storage.
	 *
	 * @return Response
	 */
	public function store($bookingId)
	{
        $user = Auth::user();

        Session::flash('bookings_show_tabs','flight-details-tab');
		$validator = Validator::make($data = Input::all(), Flightdetail::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

        $data['booking_id'] = $bookingId;

		if(Flightdetail::create($data)){
            Booking::emailBookingDetails($bookingId);
        }

		return Redirect::back();
	}

	/**
	 * Display the specified flightdetail.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$flightdetail = Flightdetail::findOrFail($id);

		return View::make('flightdetails.show', compact('flightdetail'));
	}

	/**
	 * Show the form for editing the specified flightdetail.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$flightdetail = Flightdetail::find($id);

		return View::make('flightdetails.edit', compact('flightdetail'));
	}

	/**
	 * Update the specified flightdetail in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($bookingId,$id)
	{
        $user = Auth::user();

        Session::flash('bookings_show_tabs','flight-details-tab');

		$flightdetail = FlightDetail::findOrFail($id);

        $data = [];

        $data['date'] = Input::get('date_'.$id);
        $data['time'] = Input::get('time_'.$id);
        $data['flight'] = Input::get('flight_'.$id);
        $data['flight_type'] = Input::get('flight_type_'.$id);

		$validator = Validator::make($data,Flightdetail::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}



		if($flightdetail->update($data)){
            Booking::emailBookingDetails($bookingId, 'emails.booking');
        };

		return Redirect::back();
	}

	/**
	 * Remove the specified flightdetail from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($bookingId,$id)
	{
        $user = Auth::user();
        Session::flash('bookings_show_tabs','flight-details-tab');
		if(Flightdetail::destroy($id)){
            Booking::emailBookingDetails($bookingId);
        }

		return Redirect::back();
	}

}
