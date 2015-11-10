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
        $predefinedtrips = Predefinedtrip::all();

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
        $validator = Validator::make($data = Input::all(), Predefinedtrip::$rules);

        if ($validator->fails()) {
            return Redirect::back()->withErrors($validator)->withInput();
        }

        Predefinedtrip::create($data);

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
        $predefinedtrip = Predefinedtrip::findOrFail($id);

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
        $predefinedtrip = Predefinedtrip::find($id);

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

        if (Input::has('val')) {
            if (Input::get('val') == 0)
                $predefinedtrip->amount = 0;
            $predefinedtrip->val = 0;

            $predefinedtrip->save();


            $pdf = PDF::loadView('emails/transport-cancellation',
                array('predefinedTrip' => $predefinedtrip,
                    'booking' => Booking::find($bookingid)
                )
            );

            $pdf->setPaper('a4')->save(public_path() . '/temp-files/transport-cancellation.pdf');
            return $pdf->stream('abc.pdf');
        }

        $predefinedtrip = Predefinedtrip::findOrFail($id);

        $validator = Validator::make($data = Input::all(), Predefinedtrip::$rules);

        if ($validator->fails()) {
            return Redirect::back()->withErrors($validator)->withInput();
        }

        $predefinedtrip->update($data);

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
        Predefinedtrip::destroy($id);

        return Redirect::route('predefinedtrips.index');
    }

}
