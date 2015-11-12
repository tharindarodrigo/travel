<?php

class ExcursionBookingsController extends \BaseController
{

    /**
     * Display a listing of excursionbookings
     *
     * @return Response
     */
    public function index()
    {
        $excursionbookings = Excursionbooking::all();

        return View::make('excursionbookings.index', compact('excursionbookings'));
    }

    /**
     * Show the form for creating a new excursionbooking
     *
     * @return Response
     */
    public function create()
    {
        return View::make('excursionbookings.create');
    }

    /**
     * Store a newly created excursionbooking in storage.
     *
     * @return Response
     */
    public function store()
    {
        $validator = Validator::make($data = Input::all(), Excursionbooking::$rules);

        if ($validator->fails()) {
            return Redirect::back()->withErrors($validator)->withInput();
        }

        Excursionbooking::create($data);

        return Redirect::route('excursionbookings.index');
    }

    /**
     * Display the specified excursionbooking.
     *
     * @param  int $id
     * @return Response
     */
    public function show($id)
    {
        $excursionbooking = Excursionbooking::findOrFail($id);

        return View::make('excursionbookings.show', compact('excursionbooking'));
    }

    /**
     * Show the form for editing the specified excursionbooking.
     *
     * @param  int $id
     * @return Response
     */
    public function edit($id)
    {
        $excursionbooking = Excursionbooking::find($id);

        return View::make('excursionbookings.edit', compact('excursionbooking'));
    }

    /**
     * Update the specified excursionbooking in storage.
     *
     * @param  int $id
     * @return Response
     */
    public function update($booking_id, $id)
    {
        $excursionbooking = Excursionbooking::find($id);
        if (Input::has('val')) {
            if (Input::get('val') == 0) {
                $excursionbooking->val = 0;
                $excursionbooking->save();
                $booking = Booking::find($booking_id);

                $ehi_users = User::getEhiUsers();

                $pdf = PDF::loadView('emails/excursion-cancellation', array('booking' => $booking));
                $pdf->save(public_path() . '/temp-files/excursions.pdf');

                Mail::send('emails/excursion-mail', array(
                    'booking' => Booking::find($booking->id)
                ), function ($message) use ($booking, $ehi_users) {
                    $message->attach(public_path() . '/temp-files/excursions.pdf')
                        ->subject('New Excursions : ' . $booking->reference_number)
                        ->from('noreply@srilankahotels.travel', 'SriLankaHotels.Travel');

                    $message->to('excursions@srilankahotels.travel', 'Excursions');
                    $message->to('admin@srilankahotels.travel', 'Admin');
                    if (!empty($ehi_users))
                        foreach ($ehi_users as $ehi_user) {
                            $message->to($ehi_user->email, $ehi_user->first_name);
                        }
                });
            }
        }

        $validator = Validator::make($data = Input::all(), Excursionbooking::$rules);

        if ($validator->fails()) {
            return Redirect::back()->withErrors($validator)->withInput();
        }

        $excursionbooking->update($data);

        return Redirect::back();
    }

    /**
     * Remove the specified excursionbooking from storage.
     *
     * @param  int $id
     * @return Response
     */
    public function destroy($id)
    {
        Excursionbooking::destroy($id);

        return Redirect::route('excursionbookings.index');
    }

}
