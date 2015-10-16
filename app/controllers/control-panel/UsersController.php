<?php

class UsersController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 * GET /users
	 *
	 * @return Response
	 */
	public function index()
	{
		$users = User::all();
        return View::make('control-panel.users.index',compact('users'));
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /users/create
	 *
	 * @return Response
	 */

    public function changeRole($id){


        $user = User::find($id);
        $role = DB::table('assigned_roles')->where('user_id',$id)->first();


        $role->role_id = Input::get('role_id');
        $updateRole = DB::table('assigned_roles')->where('id',$role->id)->update($role);

        if($updateRole){
            return Response::json(array(
                'success' => true,
                'msg' => $user->first_name." ".$user->last_name.' has changed to '.$role->name
            ));
        }

        return Response::json(array(
            'success' => false
        ));

    }

	public function create()
	{
		//
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
	 * @param  int  $id
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
	 * @param  int  $id
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
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
        $user = Auth::user();

        $user->email = Input::get('email');
        $user->password = Input::get('new_password');

		if($user->role_id=3){

        }
	}

	/**
	 * Remove the specified resource from storage.
	 * DELETE /users/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}