<?php

class CancellationPoliciesController extends \BaseController {

	/**
	 * Display a listing of cancelationpolicies
	 *
	 * @return Response
	 */
	public function index()
	{
//		$cancelationpolicies = CancellationPolicy::all();

//		return View::make('cancelationpolicies.index', compact('cancelationpolicies'));
        Session::forget('edit');

        return Redirect::back();

	}

	/**
	 * Show the form for creating a new cancelationpolicy
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('cancelationpolicies.create');
	}

	/**
	 * Store a newly created cancelationpolicy in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
        Session::put('manage','policies');

		$validator = Validator::make($data = Input::all(), Cancellationpolicy::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		Cancellationpolicy::create($data);

		return Redirect::back();
	}

	/**
	 * Display the specified cancelationpolicy.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$cancelationpolicy = Cancellationpolicy::findOrFail($id);

		return View::make('cancelationpolicies.show', compact('cancelationpolicy'));
	}

	/**
	 * Show the form for editing the specified cancelationpolicy.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
        Session::put('manage','policies');
        Session::put('edit','policies');

        $cancellationpolicy = CancellationPolicy::find($id);

		return Redirect::back()->with(
            array(
                'cancellationpolicy'=>$cancellationpolicy
            )
        );
	}

	/**
	 * Update the specified cancelationpolicy in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
        Session::put('manage','policies');

        $cancelationpolicy = Cancellationpolicy::findOrFail($id);

		$validator = Validator::make($data = Input::all(), Cancellationpolicy::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		$cancelationpolicy->update($data);

		return Redirect::back();
	}

	/**
	 * Remove the specified cancelationpolicy from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
        Session::put('manage','policies');

		Cancellationpolicy::destroy($id);

		return Redirect::back();
	}

}
