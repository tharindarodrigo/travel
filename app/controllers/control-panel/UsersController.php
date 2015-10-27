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
        return View::make('control-panel.users.index', compact('users'));
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

        if(!$role) {
            $insert = DB::table('assigned_roles')->insert(array('user_id'=>$id, 'role_id' => $role_id));
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
        $agents = User::whereHas('role', function ($q) {
            $q->where('name', 'Like', 'Agent');
        });

        dd($agents);

        return View::make('control-panel.users.agents.index', compact('agents'));
    }

    public function getHotelSuggestions()
    {
        dd('asdasdasd');
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

}