<?php

class RoleSessionsController extends \BaseController {

	/**
	 * Show the form for creating a new resource.
	 * GET /sessions/create
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('rolelogin');
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /sessions
	 *
	 * @return Response
	 */
	public function store()
	{

		$role = Aris\Role::where('shortname', Input::get('role'))->first();
		if (!is_object($role)) {
			die('role doesnt exist');
		}

		// If password is correct, create session and redirect to intended page
		if (Hash::check(Input::get('password'), $role->password)) {
			Session::put('aris_role',$role);
			return Redirect::to('/' . urldecode(Input::get('return')));
		}
		// otherwise go back to login 
		return Redirect::to('/rolelogin/create?role='.Input::get('role'). '&return=' . urlencode(Input::get('return')));
	}

	/**
	 * Remove the specified resource from storage.
	 * DELETE /sessions/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy()
	{
		Session::forget('aris_role');
		if (Input::has('return')) {
			return Redirect::to(Input::get('return'));			
		}
		return Redirect::to('/');
	}

}