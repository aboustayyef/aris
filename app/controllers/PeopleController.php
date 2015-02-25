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
		return View::make('People.index')->with(['type'=>'all']);
	}

	public function adminIndex()
	{
		$people = People::where('type', 'Administration' )->orderBy('order', 'asc')->get();
		return View::make('People.index')->with(['type'=>'Administration','people'=>$people]);
	}

	public function facultyIndex()
	{
		$people = People::where('type', 'Faculty' )->orderBy('lastname', 'asc')->get();
		return View::make('People.index')->with(['type'=>'Faculty','people'=>$people]);
	}

	public function staffIndex()
	{
		$people = People::where('type', 'Staff' )->orderBy('lastname', 'asc')->get();
		return View::make('People.index')->with(['type'=>'Staff','people'=>$people]);
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
	public function show($slug)
	{
		$query = Aris\People::Where('slug', $slug);
		if ($query->count() > 0) {
			$person = $query->first();
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
		$person = People::find($id);
		if ($person) {
			return View::make('People.edit')->with('person', $person);
		}
		return Response::make('Sorry, person does not exist',404);
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
		$v = Validator::make(Input::all(), People::rules());
		if ($v->fails()) {
			return Redirect::route('people.edit',$id)->withErrors($v)->withInput();
		}
		$people = People::find($id);
		if ($people->store(Input::all())) {
			return Redirect::to(Input::get('from'))->with('message','Successfully edited Person');
		}
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
		$person = People::find($id);
		$person->delete();
		return Redirect::to(Input::get('from'))->with('message','Successfully deleted person');
	}

}