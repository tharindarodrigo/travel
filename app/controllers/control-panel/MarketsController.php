<?php

class MarketsController extends \BaseController
{

    /**
     * Display a listing of markets
     *
     * @return Response
     */
    public function index()
    {
        Session::forget('edit');

        $markets = Market::all();

        return View::make('control-panel.general.markets', compact('markets'));
    }

    /**
     * Show the form for creating a new market
     *
     * @return Response
     */
    public function create()
    {
        return View::make('markets.create');
    }

    /**
     * Store a newly created market in storage.
     *
     * @return Response
     */
    public function store()
    {
        $validator = Validator::make($data = Input::all(), Market::$rules);

        if ($validator->fails()) {
            return Redirect::back()->withErrors($validator)->withInput();
        }

        if (Market::create($data)) {
            Session::flash('successful-action', 'Hotel Facility was created Successfully');
        } else {
            Session::flash('unsuccessful-action', 'Creating Hotel Facility was Unsuccessful');
        }

        return Redirect::route('control-panel.general.markets.index');
    }

    /**
     * Display the specified market.
     *
     * @param  int $id
     * @return Response
     */
    public function show($id)
    {
        $market = Market::findOrFail($id);

        return View::make('markets.show', compact('market'));
    }

    /**
     * Show the form for editing the specified market.
     *
     * @param  int $id
     * @return Response
     */
    public function edit($id)
    {
        $Market = Market::find($id);
        $markets = Market::all();
        Session::put('edit', 'edit');

        return View::make('control-panel.general.markets')
            ->with(array(
                'markets' => $markets,
                'Market' => $Market
            ));
    }

    /**
     * Update the specified market in storage.
     *
     * @param  int $id
     * @return Response
     */
    public function update($id)
    {
        $market = Market::findOrFail($id);


        $data = Input::all();

        if (!Input::has('val')) {
            $rules = Market::$rules;
        } else {
            $rules = ['val'];
        }

        $validator = Validator::make($data, $rules);

        if ($validator->fails()) {
            return Redirect::back()->withErrors($validator)->withInput();
        }

        if ($market->update($data)) {
            Session::flash('successful-action', 'Market was updated Successfully');

        } else {
            Session::flash('unsuccessful-action', 'Market update was Unsuccessful');
        }

        return Redirect::route('control-panel.general.markets.index');
    }

    /**
     * Remove the specified market from storage.
     *
     * @param  int $id
     * @return Response
     */
    public function destroy($id)
    {
        if (Market::destroy($id)) {
            Session::flash('successful-action', 'Item was deleted Successfully');
        } else {
            Session::flash('unsuccessful-action', 'Item deletion was Unsuccessful');
        }

        return Redirect::route('control-panel.general.markets.index');
    }

}
