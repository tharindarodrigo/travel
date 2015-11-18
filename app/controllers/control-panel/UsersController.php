<?php

class UsersController extends \BaseController
{

    /**
     * Display a listing of the resource.
     * GET /users
     *
     * @return Response
     */
    public function index()
    {
        $users = User::with('role')->get();
        $roles = Role::orderBy('id', 'asc')->lists('name', 'id');
        return View::make('control-panel.users.index', compact('users', 'roles'));
    }

    /**
     * Show the form for creating a new resource.
     * GET /users/create
     *
     * @return Response
     */

    public function changeRole($id)
    {


        $user = User::find($id);

        $role = DB::table('assigned_roles')->where('user_id', $id)->first();

        $role_id = Input::get('role_id');

        if (!$role) {
            $insert = DB::table('assigned_roles')->insert(array('user_id' => $id, 'role_id' => $role_id));
            if ($insert) {
                return Response::json(array(
                    'success' => true,
                    'msg' => $user->first_name . " " . $user->last_name . '\'s role has been Added'
                ));
            }
        }

        $updateRole = DB::table('assigned_roles')->where('id', $role->id)->update(array('role_id' => $role_id));

        if ($updateRole) {
            return Response::json(array(
                'success' => true,
                'msg' => $user->first_name . " " . $user->last_name . '\'s role has been changed'
            ));
        }

        return Response::json(array(
            'success' => false
        ));

    }

    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     * POST /users
     *
     * @return Response
     */
    public function store()
    {
        //
    }

    /**
     * Display the specified resource.
     * GET /users/{id}
     *
     * @param  int $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     * GET /users/{id}/edit
     *
     * @param  int $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     * PUT /users/{id}
     *
     * @param  int $id
     * @return Response
     */
    public function update($id)
    {
        $user = Auth::user();

        $user->email = Input::get('email');
        $user->password = Input::get('new_password');

        if ($user->role_id = 3) {

        }
    }

    /**
     * Remove the specified resource from storage.
     * DELETE /users/{id}
     *
     * @param  int $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }

    public function getHoteliers()
    {
        $hoteliers = User::getHoteliers();
        return View::make('control-panel.users.hoteliers.index', compact('hoteliers'));
    }

    public function getAgents()
    {
        $agents = Agent::getAgents();
        return View::make('control-panel.users.agents.index', compact('agents'));
    }

    public function getHotelSuggestions()
    {
        $hotel_name = Input::get('hotel_name');
        $hotel_list = Hotel::where('name', 'like', $hotel_name)->lists('name', 'id');

        return Response::json($hotel_list);
    }

    public function getProfile()
    {
        return View::make('profile.profile');
    }

    public function getAgentsOfUsers()
    {
        $agents = User::has('role');
        return View::make('control-panel.users.agents.index', compact('agents'));
    }

    public function getHotelWithUserPermissions($id)
    {
        $hotelier = User::with('hotel')->find($id);

        $permitted_hotels = $hotelier->hotel->lists('id');
        $hotels = Hotel::select(array('name', 'id'))->get();
        return View::make('control-panel.users.hoteliers.hotel-permissions', compact('hotelier', 'hotels', 'permitted_hotels'));
    }

    public function assignHotelPermissions($id)
    {
        $hotelIDs = Input::get('hotel_ids');
        $user = User::find($id);
        $user->hotel()->sync($hotelIDs);
        return Redirect::back();
    }

    public function updateAgent($id)
    {

        $input = Input::all();
        $agent = Agent::find($id);
        $agent->market_id = $input['market_id'];

        if (Input::has('confirm')) {

            $input = Input::all();
            $agent = Agent::find($id);
            $agent->market_id = $input['market_id'];

            $agent->save();

            $agent->users()->attach($agent->user_id);

        } elseif (Input::has('revoke')) {
            $agent->users()->detach($agent->user_id);
        }

        return Redirect::back();
    }

}