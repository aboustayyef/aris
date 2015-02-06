<?php

class SessionsController extends \BaseController {

	/**
	 * Show the form for creating a new resource.
	 * GET /sessions/create
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('login');
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /sessions
	 *
	 * @return Response
	 */
	public function store()
	{
		// validate
		$attempt = Auth::attempt(['email'=>Input::get('email'),'password'=>Input::get('password')]);
		if ($attempt) {
			if (Input::get('return')) {
				return Redirect::to(Input::get('return'));
			}
			return Redirect::to(route('admin.index'));
		} else {
			return Redirect::to('login');
		}
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
		Auth::logout();
		return Redirect::to('/');
	}

}