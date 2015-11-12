<?php

class RoomSpecificationsController extends \BaseController {

	/**
	 * Display a listing of roomspecifications
	 *
	 * @return Response
	 */
	public function index()
	{
		$roomspecificationsinlist = RoomSpecification::whereIn('id',Session::get('roomspec','id'))->get();
		$roomspecificationsnotinlist = RoomSpecification::whereNotIn('id',Session::get('roomspec','id'))->get();

        return Response::json(
            array(
                $roomspecificationsinlist,
                $roomspecificationsnotinlist
            )

        );
	}

	/**
	 * Show the form for creating a new roomspecification
	 *
	 * @return Response
	 */
	public function create()
	{
        $roomspec = Session::get('roomspec');
        $element = Input::get('roomspec');
        if(!in_array($roomspec, $element)){
            $roomspec[] = $element;
            Session::put('roomspec',$roomspec);
        }

        $this->index();
	}

	/**
	 * Store a newly created roomspecification in storage.
	 *
	 * @return Response
	 */
	public function store()
	{

	}

	/**
	 * Display the specified roomspecification.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$roomspecification = RoomSpecification::findOrFail($id);

		return View::make('roomspecifications.show', compact('roomspecification'));
	}

	/**
	 * Show the form for editing the specified roomspecification.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$roomspecification = RoomSpecification::find($id);

		return View::make('roomspecifications.edit', compact('roomspecification'));
	}

	/**
	 * Update the specified roomspecification in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$roomspecification = RoomSpecification::findOrFail($id);

		$validator = Validator::make($data = Input::all(), RoomSpecification::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		$roomspecification->update($data);

		return Redirect::route('roomspecifications.index');
	}

	/**
	 * Remove the specified roomspecification from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
        $roomspec = Session::get('roomspec');
        $array[] = $id;
        $roomspec = array_diff($roomspec,$array);

        $this->index();
    }

}
