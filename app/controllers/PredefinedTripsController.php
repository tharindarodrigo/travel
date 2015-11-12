<?php

class PredefinedTripsController extends \BaseController
{

    /**
     * Display a listing of predefinedtrips
     *
     * @return Response
     */
    public function index()
    {
        $predefinedtrips = PredefinedTrip::all();

        return View::make('predefinedtrips.index', compact('predefinedtrips'));
    }

    /**
     * Show the form for creating a new predefinedtrip
     *
     * @return Response
     */
    public function create()
    {
        return View::make('predefinedtrips.create');
    }

    /**
     * Store a newly created predefinedtrip in storage.
     *
     * @return Response
     */
    public function store()
    {
        $validator = Validator::make($data = Input::all(), PredefinedTrip::$rules);

        if ($validator->fails()) {
            return Redirect::back()->withErrors($validator)->withInput();
        }

        PredefinedTrip::create($data);

        return Redirect::route('predefinedtrips.index');
    }

    /**
     * Display the specified predefinedtrip.
     *
     * @param  int $id
     * @return Response
     */
    public function show($id)
    {
        $predefinedtrip = PredefinedTrip::findOrFail($id);

        return View::make('predefinedtrips.show', compact('predefinedtrip'));
    }

    /**
     * Show the form for editing the specified predefinedtrip.
     *
     * @param  int $id
     * @return Response
     */
    public function edit($id)
    {
        $predefinedtrip = PredefinedTrip::find($id);

        return View::make('predefinedtrips.edit', compact('predefinedtrip'));
    }

    /**
     * Update the specified predefinedtrip in storage.
     *
     * @param  int $id
     * @return Response
     */
    public function update($bookingid, $id)
    {
        $predefinedtrip = PredefinedTrip::find($id);
        $booking = Booking::getBookingData('');
        if (Input::has('val')) {
            if (Input::get('val') == 0)
                $predefinedtrip->amount = 0;
            $predefinedtrip->val = 0;

            $predefinedtrip->save();

            $booking_user = $booking->user;


            $ehi_users = User::getEhiUsers();
            $pdf = PDF::loadView('emails/transport-cancellation',
                array(
                    'predefinedTrip' => $predefinedtrip,
                    'booking' => Booking::find($bookingid)
                )
            );

            $pdf->setPaper('a4')->save(public_path() . '/temp-files/transport-cancellation.pdf');

            Mail::send('emails/transport-cancellation-mail', array(
                'predefinedTrip' => $predefinedtrip,
            ), function ($message) use ($predefinedtrip, $ehi_users) {
                $message->attach(public_path() . '/temp-files/excursions.pdf')
                    ->subject('Cancel Transfer : ' . $predefinedtrip->reference_number)
                    ->from('noreply@srilankahotels.travel', 'SriLankaHotels.Travel');

                $message->to('transport@srilankahotels.travel', 'Transportation');
                $message->bcc('admin@srilankahotels.travel', 'Admin');
                if (!empty($ehi_users))
                    foreach ($ehi_users as $ehi_user) {
                        $message->to($ehi_user->email, $ehi_user->first_name);
                    }
            });

            return Redirect::back();
        }

        //$predefinedtrip = PredefinedTrip::findOrFail($id);

//        $validator = Validator::make($data = Input::all(), PredefinedTrip::$rules);
//
//        if ($validator->fails()) {
//            return Redirect::back()->withErrors($validator)->withInput();
//        }

//        $predefinedtrip->update($data);

        return Redirect::back();
    }

    /**
     * Remove the specified predefinedtrip from storage.
     *
     * @param  int $id
     * @return Response
     */
    public function destroy($id)
    {
        PredefinedTrip::destroy($id);

        return Redirect::route('predefinedtrips.index');
    }

}
