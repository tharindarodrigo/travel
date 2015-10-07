<?php

class VouchersController extends \BaseController {

	/**
	 * Display a listing of vouchers
	 *
	 * @return Response
	 */
	public function index()
	{
		$vouchers = Voucher::all();

		return View::make('vouchers.index', compact('vouchers'));
	}

	/**
	 * Show the form for creating a new voucher
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('vouchers.create');
	}

	/**
	 * Store a newly created voucher in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$validator = Validator::make($data = Input::all(), Voucher::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		Voucher::create($data);

		return Redirect::route('vouchers.index');
	}

	/**
	 * Display the specified voucher.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$voucher = Voucher::findOrFail($id);

		return View::make('vouchers.show', compact('voucher'));
	}

	/**
	 * Show the form for editing the specified voucher.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$voucher = Voucher::find($id);

		return View::make('vouchers.edit', compact('voucher'));
	}

	/**
	 * Update the specified voucher in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$voucher = Voucher::findOrFail($id);

		$validator = Validator::make($data = Input::all(), Voucher::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		$voucher->update($data);

		return Redirect::route('vouchers.index');
	}

	/**
	 * Remove the specified voucher from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		Voucher::destroy($id);

		return Redirect::route('vouchers.index');
	}

}
