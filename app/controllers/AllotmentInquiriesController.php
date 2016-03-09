<?php

class AllotmentInquiriesController extends \BaseController
{

    /**
     * Display a listing of allotmentinquiries
     *
     * @return Response
     */
    public function index()
    {

        if (Entrust::hasRole('Admin'))  {
            $allotmentinquiries = AllotmentInquiry::orderBy('created_at', 'desc')->get();
        } else {
            $ids = DB::table('hotel_user')->select('hotel_id')->where('user_id', Auth::id())->get();

            foreach($ids as $id){
                $hotel_ids[] = $id->hotel_id;
            }

            $allotmentinquiries = AllotmentInquiry::whereIn('hotel_id', $hotel_ids)->orderBy('created_at', 'desc')->get();
            //dd($allotmentinquiries);
        }

        return View::make('control-panel.inquiries.allotment-inquiries', compact('allotmentinquiries'));
    }

    /**
     * Show the form for creating a new allotmentinquiry
     *
     * @return Response
     */
    public function create()
    {
        return View::make('allotmentinquiries.create');
    }

    /**
     * Store a newly created allotmentinquiry in storage.
     *
     * @return Response
     */
    public function store()
    {
        $validator = Validator::make($data = Input::all(), AllotmentInquiry::$rules);

        if ($validator->fails()) {
            return Redirect::back()->withErrors($validator)->withInput();
        }

        AllotmentInquiry::create($data);

        return Redirect::route('allotmentinquiries.index');
    }

    /**
     * Display the specified allotmentinquiry.
     *
     * @param  int $id
     * @return Response
     */
    public function show($id)
    {
        $allotmentinquiry = AllotmentInquiry::findOrFail($id);

        return View::make('allotmentinquiries.show', compact('allotmentinquiry'));
    }

    /**
     * Show the form for editing the specified allotmentinquiry.
     *
     * @param  int $id
     * @return Response
     */
    public function edit($id)
    {
        $allotmentinquiry = AllotmentInquiry::find($id);

        return View::make('allotmentinquiries.edit', compact('allotmentinquiry'));
    }

    /**
     * Update the specified allotmentinquiry in storage.
     *
     * @param  int $id
     * @return Response
     */
    public function update($id)
    {
        $allotmentinquiry = AllotmentInquiry::findOrFail($id);

        $validator = Validator::make($data = Input::all(), AllotmentInquiry::$rules);

        if ($validator->fails()) {
            return Redirect::back()->withErrors($validator)->withInput();
        }

        if (AllotmentInquiry::allotmentIsAvailable($allotmentinquiry)) {
            $allotmentinquiry->update(array('status'=>1, 'viewed'=>0));
        } else {
            Session::flash('global', 'Sorry You have not ');
            //Enter Rates
        }

       // $allotmentinquiry->update($data);
       // return Redirect::route('allotmentinquiries.index');

        return Redirect::back();
    }

    /**
     * Remove the specified allotmentinquiry from storage.
     *
     * @param  int $id
     * @return Response
     */
    public function destroy($id)
    {
        AllotmentInquiry::destroy($id);

        return Redirect::route('allotmentinquiries.index');
    }

}
