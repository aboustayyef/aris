<?php

namespace Aris\Http\Controllers;

use Illuminate\Http\Request;
use Aris\People;
class PeopleController extends Controller
{
	/**
	 * Display a listing of the resource.
	 * GET /people
	 *
	 * @return Response
	 */
	public function index(Request $request)
	{
		return view('People.index')->with(['category'=>'index', 'title' => 'ARIS | People']);
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /people/create
	 *
	 * @return Response
	 */

	/**
	 * Display the specified category index.
	 * GET /people/{category}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show(Request $request, $category)
	{
		// If category (example: aris.com.gh/admin)
		if ( in_array($category, ['staff', 'admin', 'faculty'])) {
			$dict = ['admin' =>	'Administration', 'staff' => 'Staff', 'faculty' => 'Faculty'];
			$category = $dict[$category];

			$people = People::where('type', $category )->orderBy('order', 'asc')->get();
			return view('People.index')->with(compact('category'))->with('title', 'ARIS People | ' . $category )->with(compact('people'));
		}

		// If person's slug (example: aris.com.gh/fatma-odaymat)
		
		if (People::slugExists($category)) {
			$slug = $category;
			$person = People::where('slug', $slug)->first();
			return view('People.person')->with(compact('person'))->with('title',  "$person->title $person->firstname $person->lastname | ARIS People" );
		}

		// otherwise
		return redirect('/people');
	}

	public function create()
	{
		if (Auth::check()) {
			return view('People.create');
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
	public function person(Request $request, $category, $slug){
		dd('category: ' . $category . ' . Slug: ' . $slug);
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
			return view('People.edit')->with('person', $person);
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
