<?php

class CustomTripsController extends \BaseController
{

    /**
     * Display a listing of customtrips
     *
     * @return Response
     */
    public function index()
    {
        $customtrips = Customtrip::all();

        return View::make('customtrips.index', compact('customtrips'));
    }

    /**
     * Show the form for creating a new customtrip
     *
     * @return Response
     */
    public function create()
    {
        return View::make('customtrips.create');
    }

    /**
     * Store a newly created customtrip in storage.
     *
     * @return Response
     */
    public function store()
    {
        $validator = Validator::make($data = Input::all(), Customtrip::$rules);

        if ($validator->fails()) {
            return Redirect::back()->withErrors($validator)->withInput();
        }

        Customtrip::create($data);

        return Redirect::route('customtrips.index');
    }

    /**
     * Display the specified customtrip.
     *
     * @param  int $id
     * @return Response
     */
    public function show($id)
    {
        $customtrip = Customtrip::findOrFail($id);

        return View::make('customtrips.show', compact('customtrip'));
    }

    /**
     * Show the form for editing the specified customtrip.
     *
     * @param  int $id
     * @return Response
     */
    public function edit($id)
    {
        $customtrip = Customtrip::find($id);

        return View::make('customtrips.edit', compact('customtrip'));
    }

    /**
     * Update the specified customtrip in storage.
     *
     * @param  int $id
     * @return Response
     */
    public function update($bookingid, $id)
    {
        $customtrip = CustomTrip::findOrFail($id);

        if (Input::has('val')) {
            if (Input::get('val') == 0){
                $customtrip->amount = 0;
                $customtrip->val = 0;

                $customtrip->save();

                $pdf = PDF::loadView('emails/transport-cancellation',
                    array('customTrip' => $customtrip,
                        'booking' => Booking::find($bookingid)
                    )
                );
            }

            $ehi_users = User::getEhiUsers();
            $pdf = PDF::loadView('emails/transport-cancellation',
                array(
                    'customTrip' => $customtrip,
                    'booking' => Booking::find($bookingid)
                )
            );

            $pdf->setPaper('a4')->save(public_path() . '/temp-files/transport-cancellation.pdf');

            Mail::send('emails/transport-cancellation-mail', array(
                'customTrip' => $customtrip,
            ), function ($message) use ($customtrip, $ehi_users) {
                $message->attach(public_path() . '/temp-files/excursions.pdf')
                    ->subject('Cancel Transfer : ' . $customtrip->reference_number)
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

        $validator = Validator::make($data = Input::all(), Customtrip::$rules);

        if ($validator->fails()) {
            return Redirect::back()->withErrors($validator)->withInput();
        }

        $customtrip->update($data);

        return Redirect::back();
    }

    /**
     * Remove the specified customtrip from storage.
     *
     * @param  int $id
     * @return Response
     */
    public function destroy($id)
    {
        Customtrip::destroy($id);
        return Redirect::route('customtrips.index');
    }

}
