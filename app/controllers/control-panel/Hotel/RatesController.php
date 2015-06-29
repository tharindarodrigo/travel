<?php

class RatesController extends \BaseController
{

    /**
     * Display a listing of rates
     *
     * @return Response
     */
    public function index($hotelid)
    {
        $rates = Rate::all();

        return View::make('control-panel.hotel.rates.index', compact('hotelid', 'rates'));
    }

    /**
     * Show the form for creating a new rate
     *
     * @return Response
     */
    public function create($hotelid)
    {
        $rates = Rate::all();
        return View::make('control-panel.hotel.rates.create', compact('hotelid', 'rates'));
    }

    /**
     * Store a newly created rate in storage.
     *
     * @return Response
     */
    public function store($hotelid)
    {
//        return Response::json(Input::all());

        $validator = Validator::make($data = Input::all(), Rate::$rules);


        if ($validator->fails()) {
            return Response::json(array("errors" => $validator->errors()));
        }

        $rates = Input::get('rates');
        $keys = Input::get('keys');
        $markets = Input::get('markets');
        $inserted_ids = array();


        $rates = explode(',', $rates);
        $keys = explode(',', $keys);
        $markets = explode(',', $markets);

        $data = array();

        mainLoop:
        foreach ($markets as $market) {

            $i = -1;
            foreach ($rates as $rate) {
                $i++;

                $ids = explode("-", $keys[$i]);

                $data = array(

                    'from' => Input::get("from"),
                    'to' => Input::get("to"),
                    'rate' => $rate,
                    'hotel_id' => $hotelid,
                    'meal_basis_id' => $ids[0],
                    'room_specification_id' => $ids[1],
                    'room_type_id' => Input::get("room_type_id"),
                    'user_id' => Auth::user()->id,
                    'val' => 1,
                    'market_id' => $market
                );

                $from = $data["from"];
                $to = $data["to"];


                $conditions = array(
                    'meal_basis_id' => $ids[0],
                    'room_specification_id' => $ids[1],
                    'room_type_id' => Input::get("room_type_id"),
                    'market_id' => $market
                );

                $newperiods = array();

                $newperiods[] = array(

                    'from' => $from,
                    'to' => $to,
                    'rate' => $rate
                );

                /*
                 * <------------|------------------|--------------|-------------------|----------------->
                 *              a         <        x      <       y         <         b
                 */

                $existing = Rate::where($conditions)->where('from', '<', $from)->where('to', '>', $to)->first();


                if (!empty($existing->id)) {

                    $newperiods = array(
                        array(
                            "from" => $existing["from"],
                            "to" => $from,
                            "rate" => $existing->rate
                        ), array(
                            "from" => $from,
                            "to" => $to,
                            "rate" => $rate
                        ), array(
                            "from" => $to,
                            "to" => $existing->to,
                            "rate" => $existing->rate
                        )
                    );


                    Rate::where("id", $existing->id)->delete();

                } else {


                    /*
                     * <------------|------------------|--------------|-------------------|----------------->
                     *              x         <        a      <       b         <         y
                     */

                    $existing1 = Rate::where($conditions)->where('from', '>=', $from)->where('to', '<=', $to)->get();

                    if (!empty($existing1)) {

                        $conflicting_ids = array();

                        foreach ($existing1 as $conflict) {
                            $conflicting_ids[] = $conflict->id;
                        }

                        Rate::whereIn('id', $conflicting_ids)->delete();

                        $newperiods = array(
                            array(
                                'from' => $from,
                                'to' => $to,
                                'rate' => $rate
                            )
                        );
                    }


                    /*
                     * <------------|------------------|--------------|-------------------|----------------->
                     *              a         <        x      <       b         <         y
                     */

//                    $existing_condition_1 = Rate::where($conditions)->where('from', '<=', $from)->where('to', '>=', $from)->where('to', '<=', $to)->first();
//
//                    if (!empty($existing_condition_1->id)) {
//
//                        Rate::where('id', $existing_condition_1->id)->delete();
//
//                        $newperiods[] =
//                            array(
//                                'from' => $existing_condition_1->from,
//                                'to' => $from,
//                                'rate' => $existing_condition_1->rate
//                            );
//
//                        $newperiods[] =
//                            array(
//                                'from' => $from,
//                                'to' => $to,
//                                'rate' => $rate
//                            );
//                    }

                    /*
                     * <------------|------------------|--------------|-------------------|----------------->
                     *              x         <        a      <       y         <         b
                     */

                    $existing_condition_2 = Rate::where($conditions)->where('from', '>=', $from)->where('from', '<=', $to)->where('to', '>=', $to)->first();

                    if (!empty($existing_condition_2->id)) {

                        Rate::where('id', $existing_condition_2->id)->delete();

                        $newperiods[] =
                            array(
                                'from' => $from,
                                'to' => $existing_condition_2->from,
                                'rate' => $existing_condition_2->rate
                            );

                        $newperiods[] = array(
                            'from' => $from,
                            'to' => $to,
                            'rate' => $data["rate"]
                        );
                    }


//                    $conflictingdata = Rate::where($conditions)->where('from', '>=', $from)->where('from', '<=', $to)->get();
//
//                    Rate::where('id',$conflictingdata->id)->delete();
//
//                    if (count($conflictingdata)) {
//
//                        $newperiods = array(
//
//                                'from' => $from,
//                                'to' => $to,
//                                'rate' => $data["rate"]
//                        );
//                    }

                }



                foreach ($newperiods as $newperiod) {

//                    dd($newperiods);

                    $data = array_merge($data, $newperiod);

                    if ($insertion = Rate::create($data)) {
                        $inserted_ids[] = $insertion->id;
                    } else {
                        Rate::whereIn('id', $inserted_ids)->delete();
                        return Response::json(array('error' => 'There was an error entering rates. Please Contact Your Administrator'));
                    }
                }
            }

        }

        Return Response::json($data);

    }

//    public function breakPeriods($array){
//
//        /*
//         * $array contains fields
//         * "from", "to", "room_type_id", "room_specification_id","meal_basis_id","market_id"
//        */
//
//
//
//
//        $newdaterange = array();
//
//        if($from >= $existing->from && $to <= $existing->to ){
//            $newdaterange = array(
//                array(
//                    "from" => $existing->from,
//                    "to" => $array["from"],
//                    "rate" => $existing["rate"]
//                ),
//
//                array(
//                    "from" => $array["from"],
//                    "to" => $array["to"],
//                    "rate" => $existing["rate"]
//                ),
//
//                array(
//                    "from" => $existing->$array["to"],
//                    "to" => $existing->to,
//                    "rate" => $existing["rate"]
//                )
//            );
//        }
//
//        /*
//         *
//         * The variables below are written analogous to coinside the dates with a number line
//         *
//         */
//
//
//        if(( $existing->from <= $from && $from <= $existing->to) && $to <= $existing->to){
//
//        /*
//         * <------------|------------------|--------------|-------------------|----------------->
//         *              a         <        x      <       b         <         y
//         */
//
//            $conflictingRecords = Rate::whereBetween('from', array($existing->from, $existing->to))->where($array)->get();
//
////            $otheConflictingRecords = Rate::where('from','<=', $to)->where('')->
//        }
//
//        else if(($from <= $existing->from) && ( $existing->from <= $to && $to <= $existing->to)){
//
//        /*
//         * <------------|------------------|--------------|-------------------|----------------->
//         *              x         <        a      <       y          <        b
//         */
//
//
//        }
//
//        else if($from <= $existing->from && $existing->to <= $to ){
//
//        /*
//         * <------------|------------------|--------------|-------------------|----------------->
//         *              x         <        a      <       b          <        y
//         */
//
//        }
//
//
//
//
//    }

    /**
     * Display the specified rate.
     *
     * @param  int $id
     * @return Response
     */
    public function show($id)
    {
        $rate = Rate::findOrFail($id);

        return View::make('control-panel.hotel.rates.show', compact('rate'));
    }

    /**
     * Show the form for editing the specified rate.
     *
     * @param  int $id
     * @return Response
     */
    public function edit($id)
    {
        $rate = Rate::find($id);

        return View::make('rates.edit', compact('rate'));
    }

    /**
     * Update the specified rate in storage.
     *
     * @param  int $id
     * @return Response
     */
    public function update($id)
    {
        $rate = Rate::findOrFail($id);

        $validator = Validator::make($data = Input::all(), Rate::$rules);

        if ($validator->fails()) {
            return Redirect::back()->withErrors($validator)->withInput();
        }

        $rate->update($data);

        return Redirect::route('rates.index');
    }

    /**
     * Remove the specified rate from storage.
     *
     * @param  int $id
     * @return Response
     */
    public function destroy($id)
    {
        Rate::destroy($id);
        return Redirect::route('rates.index');
    }

    public function getRateData()
    {
        $room_id = Input::get('room_type_id');

        $roomspaces = RoomType::with('roomSpecification')->find($room_id);
        return Response::json(array($roomspaces, MealBasis::all()));
    }


}
