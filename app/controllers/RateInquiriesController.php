<?php

class RateInquiriesController extends \BaseController
{

    /**
     * Display a listing of rateinquiries
     *
     * @return Response
     */
    public function index()
    {
        if (Entrust::hasRole('Admin')) {
            $rateinquiries = RateInquiry::orderBy('created_at', 'desc')->get();
        } else {
            $hotel_ids = DB::table('hotel_user')->select('hotel_id')->where('user_id', Auth::id())->get();
            $hotel_ids = array_values($hotel_ids);
            $rateinquiries = RateInquiry::whereIn('hotel_id', $hotel_ids)->get();
        }

        return View::make('control-panel.inquiries.rate-inquiries', compact('rateinquiries'));
    }

    /**
     * Show the form for creating a new rateinquiry
     *
     * @return Response
     */
    public function create()
    {
        return View::make('rateinquiries.create');
    }

    /**
     * Store a newly created rateinquiry in storage.
     *
     * @return Response
     */
    public function store()
    {
        $validator = Validator::make($data = Input::all(), Rateinquiry::$rules);

        if ($validator->fails()) {
            return Redirect::back()->withErrors($validator)->withInput();
        }

        Rateinquiry::create($data);

        return Redirect::route('rateinquiries.index');
    }

    /**
     * Display the specified rateinquiry.
     *
     * @param  int $id
     * @return Response
     */
    public function show($id)
    {
        $rateinquiry = Rateinquiry::findOrFail($id);

        return View::make('rateinquiries.show', compact('rateinquiry'));
    }

    /**
     * Show the form for editing the specified rateinquiry.
     *
     * @param  int $id
     * @return Response
     */
    public function edit($id)
    {
        $rateinquiry = Rateinquiry::find($id);

        return View::make('rateinquiries.edit', compact('rateinquiry'));
    }

    /**
     * Update the specified rateinquiry in storage.
     *
     * @param  int $id
     * @return Response
     */
    public function update($id)
    {

        $rateinquiry = Rateinquiry::findOrFail($id);


        $validator = Validator::make($data = Input::all(), Rateinquiry::$rules);

        if ($validator->fails()) {
            return Redirect::back()->withErrors($validator)->withInput();
        }

        if (RateInquiry::rateIsAvailable($rateinquiry)) {
            dd('done');

        } else {
            dd(':(');
            //Enter Rates
        }

        $rateinquiry->update($data);

        return Redirect::route('rateinquiries.index');
    }

    /**
     * Remove the specified rateinquiry from storage.
     *
     * @param  int $id
     * @return Response
     */
    public function destroy($id)
    {
        Rateinquiry::destroy($id);

        return Redirect::route('rateinquiries.index');
    }

}
