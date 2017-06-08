<?php

namespace Aris\Http\Controllers;

use Illuminate\Http\Request;
use Aris\People;
use \Auth;

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
	 * Display the specified category index.
	 * GET /people/{category}
	 *
	 * @param  int  $id
	 * @return Response
	 */

	public function show(Request $request, $category)
	{
		// If a category is entered (example: aris.com.gh/admin)

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

		// otherwise, a wrong url is entered
		
		return redirect('/people');
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
			return view('People.create')->with('person', New People);
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
	public function store(Request $request)
	{
		$this->validate($request, People::validationRules());
		$person = new People;
		if ($person->store($request->all())) {
			return redirect()->route('people.index')->with('message','Successfully added a new Person');
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
	public function update(Request $request, People $person)
	{
		$this->validate($request, People::validationRules());

		if ($person->store($request->all())) {
			return redirect($request->get('from'))->with('message','Successfully edited Person');
		}
	}

	/**
	 * Remove the specified resource from storage.
	 * DELETE /people/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy(Request $request, People $person)
	{
		$person->delete();
		return redirect($request->get('from'))->with('message','Successfully deleted Person');
	}


}
