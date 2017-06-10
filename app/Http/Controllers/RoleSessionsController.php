<?php

namespace Aris\Http\Controllers;

use Illuminate\Http\Request;
use Aris\Role;
use \Hash;
use \Session;
use \Redirect;

class RoleSessionsController extends Controller
{
    public function create(Request $request)
	{
		return view('rolelogin')->with(compact('request'));
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /sessions
	 *
	 * @return Response
	 */
	
	public function store(Request $request)
	{

		$role = Role::where('shortname', $request->get('role'))->first();
		if (!is_object($role)) {
			die('role doesnt exist');
		}

		// If password is correct, create session and redirect to intended page
		if (Hash::check($request->get('password'), $role->password)) {
			Session::put('aris_role',$role);
			return Redirect::to('/' . urldecode($request->get('return')));
		}
	
		// otherwise go back to login 
		session()->flash('wrongpassword', true);
		return redirect('/rolelogin/create?role='.$request->get('role'). '&return=' . urlencode($request->get('return')));
	}

	/**
	 * Remove the specified resource from storage.
	 * DELETE /sessions/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */

	public function destroy(Request $request)
	{
		Session::forget('aris_role');
		if ($request->has('return')) {
			return Redirect::to($request->get('return'));			
		}
		return Redirect::to('/');
	}

}
