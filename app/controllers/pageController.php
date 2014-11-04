<?php

class PageController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 * GET /page
	 *
	 * @return Response
	 */
	public function index()
	{
		if (Auth::check()) {
			return View::make('pages.index');
		}else{
			return Redirect::to('login');
		}
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /page/create
	 *
	 * @return Response
	 */
	public function create()
	{
		if (Auth::check()) {
			return View::make('pages.create');
		}else{
			return Redirect::to('login');
		}
		
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /page
	 *
	 * @return Response
	 */
	public function store()
	{
		$v = Validator::make(Input::all(), Page::rules());
		if ($v->fails()) {
			return Redirect::route('page.create')->withErrors($v)->withInput();
		}
		$page = new Page;
		$page->title = Input::get('title');
		$page->slug = Str::slug($page->title);
		$page->content = Input::get('content');
		$page->section_id = Input::get('section');
		$page->save();
		return Redirect::to('/')->with('flashMessage','You have succesfully created a new page');
	}

	/**
	 * Display the specified resource.
	 * GET /page/{id}
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
	 * GET /page/{id}/edit
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$pagetoedit = Page::find($id);
		if (is_object($pagetoedit)) {
			return View::make('pages.edit')->with('page', $pagetoedit);
		} else {
			return "page doesn't exist";
		}
	}

	/**
	 * Update the specified resource in storage.
	 * PUT /page/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$v = Validator::make(Input::all(), Page::rules());
		if ($v->fails()) {
			return Redirect::route('pages.edit', ['id' => $id])->withErrors($v)->withInput();
		}
	 	
	 	$page = Page::find($id);
	 	$page->title = Input::get('title');
	 	$page->section_id = Input::get('section');
	 	$page->content = Input::get('content');

	 	$page->save();

	 	return Redirect::route('pages.index')->with('message', 'Page Updated');

	}

	/**
	 * Remove the specified resource from storage.
	 * DELETE /page/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}