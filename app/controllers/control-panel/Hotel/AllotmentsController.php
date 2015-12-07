<?php

use Illuminate\Database\Eloquent\ModelNotFoundException;


class AllotmentsController extends \BaseController {
    private $_user;
    private $_parameters;

    public function __construct()
    {
        $this->_user = Auth::user();
        $this->_parameters = Route::current()->parameters();
        if(!User::hasHotelPermission($this->_user, $this->_parameters['hotels']))
            if (!Entrust::hasRole('Admin')) {
                App::abort(403);
            }
    }
	/**
	 * Display a listing of allotments
	 *
	 * @return Response
	 */
	public function index($hotelid)
	{
        Session::forget('edit');
		$allotments = Allotment::where('hotel_id',$hotelid)->get();

		return View::make('control-panel.hotel.allotments.index', compact('allotments', 'hotelid'));
	}

	/**
	 * Show the form for creating a new allotment
	 *
	 * @return Response
	 */
	public function create($hotelid)
	{
        $allotments = Allotment::all();
		return View::make('control-panel.hotel.allotments.index', compact('hotelid', 'allotments'));
	}

	/**
	 * Store a newly created allotment in storage.
	 *
	 * @return Response
	 */
	public function store($hotelid)
	{
        $data = Input::all();

		$validator = Validator::make($data, Allotment::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

        $data = array(

            'from' => Input::get("from"),
            'to' => Input::get("to"),
            'rooms' => Input::get('rooms'),
            'room_type_id' => Input::get("room_type_id"),
            'hotel_id' => $hotelid,
            'user_id' => Auth::user()->id,
            'val' => 1,
        );

        $from = $data["from"];
        $to = $data["to"];
        $rooms = $data['rooms'];

        $newperiods = array();
        $newperiods[] = array(

            'from' => $from,
            'to' => $to,
            'rooms' => Input::get('rooms')
        );

        $conditions = array(
            'room_type_id' => $data['room_type_id']
        );

        $from_date = new DateTime($from);
        $to_date = new DateTime($to);

        $from_date->sub(new DateInterval('P1D'));
        $to_date->add(new DateInterval('P1D'));

        $existing = Allotment::where($conditions)->where('from', '<', $from)->where('to', '>', $to)->first();

        if (!empty($existing->id)) {

            $newperiods = array(
                array(
                    "from" => $existing["from"],
                    "to" => $from_date->format('Y-m-d'),
                    "rooms" => $existing->rooms

                ), array(
                    "from" => $from,
                    "to" => $to,
                    "rooms" => $rooms

                ), array(
                    "from" => $to_date->format('Y-m-d'),
                    "to" => $existing->to,
                    "rooms" => $existing->rooms
                )
            );

            $this->insertAllotment($newperiods, $data);


            Allotment::where("id", $existing->id)->delete();

        } else {

            /*
             * <------------|------------------|--------------|-------------------|----------------->
             *              x         <        a      <       b         <         y
             */

            $existing1 = Allotment::where($conditions)->where('from', '>=', $from)->where('to', '<=', $to)->get();

            if ($existing1->count()) {

                $conflicting_ids = array();

                foreach ($existing1 as $conflict) {
                    $conflicting_ids[] = $conflict->id;
                }

                Allotment::whereIn('id', $conflicting_ids)->delete();

                $newperiods = array(
                    array(
                        'from' => $from,
                        'to' => $to,
                        'rooms' => $rooms
                    )
                );

                $this->insertAllotment($newperiods, $data);

            }

            /*
             * <------------|------------------|--------------|-------------------|----------------->
             *              a         <        x      <       b         <         y
             */

            $existing_condition_1 = Allotment::where($conditions)->where('from', '<=', $from)->where('to', '>=', $from)->where('to', '<', $to)->first();

            if (!empty($existing_condition_1->id)) {

                Allotment::where('id', $existing_condition_1->id)->delete();

                $newperiods = array(
                    array(
                        'from' => $existing_condition_1->from,
                        'to' => $from_date->format('Y-m-d'),
                        'rooms' => $existing_condition_1->rooms
                    ),
                    array(
                        'from' => $from,
                        'to' => $to,
                        'rooms' => $rooms
                    )
                );

                $this->insertAllotment($newperiods, $data);
            }

            /*
             * <------------|------------------|--------------|-------------------|----------------->
             *              x         <        a      <       y         <         b
             */

            $existing_condition_2 = Allotment::where($conditions)->where('from', '>=', $from)->where('from', '<=', $to)->where('to', '>', $to)->first();

            if (!empty($existing_condition_2->id)) {

                Allotment::where('id', $existing_condition_2->id)->delete();

                $newperiods = array(

                    array(
                        'from' => $from,
                        'to' => $to,
                        'rooms' => $rooms
                    ), array(
                        'from' => $to_date->format('Y-m-d'),
                        'to' => $existing_condition_2->to,
                        'rooms' => $existing_condition_2->rooms
                    )
                );

                $this->insertAllotment($newperiods, $data);

            } else {

                $this->insertAllotment($newperiods, $data);

            }

        }


		return Redirect::back();
	}


    public function insertAllotment($newperiods, $data)
    {
        foreach ($newperiods as $newperiod) {

            $data_wo_user_id = $data = array_merge($data, $newperiod);

            unset($data_wo_user_id['user_id']);

            $duplicate_rate = Allotment::where($data_wo_user_id)->get();

            if ($duplicate_rate->count() == 0) {
                if ($insertion = Allotment::create($data)) {
                    $inserted_ids[] = $insertion->id;
                } else {
                    Allotment::whereIn('id', $inserted_ids)->delete();
                    return Response::json(array('error' => 'There was an error entering rates. Please Contact Your Administrator'));
                }
            }

        }
    }

	/**
	 * Display the specified allotment.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$allotment = Allotment::findOrFail($id);

		return View::make('control-panel.hotel.allotments.show', compact('allotment'));
	}

	/**
	 * Show the form for editing the specified allotment.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($hotelid,$id)
	{
        $allotments = Allotment::where('hotel_id', $hotelid)->get();

        try{
            $allotment = Allotment::findOrFail($id);
        } catch (ModelNotFoundException $e){
            return Redirect::to('control-panel/errors/404');
        }
        Session::flash('edit','edit');

		return View::make('control-panel.hotel.allotments.allotments', compact('hotelid','allotment', 'allotments'));
	}

	/**
	 * Update the specified allotment in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($hotelid,$id)
	{
        if (Input::has('val')) {

            $rules = ['val'];
            $allotment = Allotment::findOrFail($id);
            $data = Input::all();
            $validator = Validator::make($data, $rules);

            if ($validator->fails())
            {
                return Redirect::back()->withErrors($validator)->withInput();
            }

            if ($allotment->update($data)) {

                Session::flash('successful-action', 'Hotel Facility was updated Successfully');
                return Redirect::back();

            } else {
                Session::flash('unsuccessful-action', 'Hotel Facility update was Unsuccessful');
            }

        } else {

            $data = Input::all();

            //dd($data);

            $validator = Validator::make($data, Allotment::$rules);

            if ($validator->fails())
            {
                return Redirect::back()->withErrors($validator)->withInput();
            }

            $data = array(

                'from' => Input::get("from"),
                'to' => Input::get("to"),
                'rooms' => Input::get('rooms'),
                'room_type_id' => Input::get("room_type_id"),
                'hotel_id' => $hotelid,
                'user_id' => Auth::user()->id,
                'val' => 1,
            );

            $from = $data["from"];
            $to = $data["to"];
            $rooms = $data['rooms'];

            $newperiods = array();
            $newperiods[] = array(

                'from' => $from,
                'to' => $to,
                'rooms' => Input::get('rooms')
            );

            $conditions = array(
                'room_type_id' => $data['room_type_id']
            );

            $from_date = new DateTime($from);
            $to_date = new DateTime($to);

            $from_date->sub(new DateInterval('P1D'));
            $to_date->add(new DateInterval('P1D'));

            $existing = Allotment::where($conditions)->where('from', '<', $from)->where('to', '>', $to)->first();

            if (!empty($existing->id)) {

                $newperiods = array(
                    array(
                        "from" => $existing["from"],
                        "to" => $from_date->format('Y-m-d'),
                        "rooms" => $existing->rooms
                    ), array(
                        "from" => $from,
                        "to" => $to,
                        "rooms" => $rooms
                    ), array(
                        "from" => $to_date->format('Y-m-d'),
                        "to" => $existing->to,
                        "rooms" => $existing->rooms
                    )
                );

                $this->insertAllotment($newperiods, $data);


                Allotment::where("id", $existing->id)->delete();

            } else {

                /*
                 * <------------|------------------|--------------|-------------------|----------------->
                 *              x         <        a      <       b         <         y
                 */

                $existing1 = Allotment::where($conditions)->where('from', '>=', $from)->where('to', '<=', $to)->get();

                if ($existing1->count()) {

                    $conflicting_ids = array();

                    foreach ($existing1 as $conflict) {
                        $conflicting_ids[] = $conflict->id;
                    }

                    Allotment::whereIn('id', $conflicting_ids)->delete();

                    $newperiods = array(
                        array(
                            'from' => $from,
                            'to' => $to,
                            'rooms' => $rooms
                        )
                    );

                    $this->insertAllotment($newperiods, $data);

                }

                /*
                 * <------------|------------------|--------------|-------------------|----------------->
                 *              a         <        x      <       b         <         y
                 */

                $existing_condition_1 = Allotment::where($conditions)->where('from', '<=', $from)->where('to', '>=', $from)->where('to', '<', $to)->first();

                if (!empty($existing_condition_1->id)) {

                    Allotment::where('id', $existing_condition_1->id)->delete();

                    $newperiods = array(
                        array(
                            'from' => $existing_condition_1->from,
                            'to' => $from_date->format('Y-m-d'),
                            'rooms' => $existing_condition_1->rooms
                        ),
                        array(
                            'from' => $from,
                            'to' => $to,
                            'rooms' => $rooms
                        )
                    );

                    $this->insertAllotment($newperiods, $data);
                }

                /*
                 * <------------|------------------|--------------|-------------------|----------------->
                 *              x         <        a      <       y         <         b
                 */

                $existing_condition_2 = Allotment::where($conditions)->where('from', '>=', $from)->where('from', '<=', $to)->where('to', '>', $to)->first();

                if (!empty($existing_condition_2->id)) {

                    Allotment::where('id', $existing_condition_2->id)->delete();

                    $newperiods = array(

                        array(
                            'from' => $from,
                            'to' => $to,
                            'rooms' => $rooms
                        ), array(
                            'from' => $to_date->format('Y-m-d'),
                            'to' => $existing_condition_2->to,
                            'rooms' => $existing_condition_2->rooms
                        )
                    );

                    $this->insertAllotment($newperiods, $data);

                } else {

                    Allotment::destroy($id);

                    $this->insertAllotment($newperiods, $data);

                }

            }


            return Redirect::route('control-panel.hotel.hotels.allotments.index',$hotelid);

        }


	}

	/**
	 * Remove the specified allotment from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($hotel_id,$id)
	{
		Allotment::destroy($id);
        return Redirect::back();
	}

}
