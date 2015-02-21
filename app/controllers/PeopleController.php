<?php
use Aris\People;

class PeopleController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 * GET /people
	 *
	 * @return Response
	 */
	public function index()
	{
		if (Input::has('type') && in_array(Input::get('type'), ['admin','teacher', 'staff'])) {
			$people = People::where('type', 'like', '%' . Input::get('type') . '%' )->get();
		}else{
			$people = People::all()->sortBy('lastname');
		}
		return View::make('People.index')->with('input',Input::all())->with('people',$people);
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /people/create
	 *
	 * @return Response
	 */
	public function create()
	{
		if (Auth::check()) {
			return View::make('People.create');
		}else{
			return Redirect::to('login');
		}
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /people
	 *
	 * @return Response
	 */
	public function store()
	{
		$v = Validator::make(Input::all(), People::rules());
		if ($v->fails()) {
			return Redirect::route('people.create')->withErrors($v)->withInput();
		}
		// $node = new Node;
		$person = new People;
		if ($person->store(Input::all())) {
			return Redirect::route('people.index')->with('message','Successfully added a new Person');
		}
	}

	/**
	 * Display the specified resource.
	 * GET /people/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		if ($person = People::find($id)) {
			return View::make('People.show')->with(compact('person'));
		} else {
			return "Sorry, this person doesn't exist";
		}
		
	}

	/**
	 * Show the form for editing the specified resource.
	 * GET /people/{id}/edit
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
	 * PUT /people/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 * DELETE /people/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}