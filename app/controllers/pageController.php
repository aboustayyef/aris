<?php
use Aris\Node;
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
	// public function create()
	// {
	// 	if (Auth::check()) {
	// 		return View::make('pages.create');
	// 	}else{
	// 		return Redirect::to('login');
	// 	}

	// }

	/**
	 * Store a newly created resource in storage.
	 * POST /page
	 *
	 * @return Response
	 */
	public function store()
	{
		$v = Validator::make(Input::all(), Node::rules());
		if ($v->fails()) {
			return Redirect::route('page.create')->withErrors($v)->withInput();
		}
		$node = new Node;
		$node->name = Input::get('title');
		$node->slug = Str::slug($node->name);
		$node->content = Input::get('content');
		$node->save();
		$message = 'You have succesfully created a new page';
		return Redirect::to(Input::get('from'))->with('message',$message);
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
		$pagetoedit = Node::find($id);
		if (is_object($pagetoedit)) {
			return View::make('pages.edit')->with('page', $pagetoedit)->with('from', Request::path());
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
		$v = Validator::make(Input::all(), Node::rules());
		if ($v->fails()) {
			return Redirect::route('pages.edit', ['id' => $id])->withErrors($v)->withInput();
		}

	 	$node = Node::find($id);
	 	$node->name = Input::get('title');
	 	$node->content = Input::get('content');
	 	$node->last_edited_by = Auth::user()->email;
	 	$node->save();
	 	$message = 'Page <strong>'.$node->name.'</strong> updated. <a href="'.$node->absoluteSlug().'">Click Here to see it</a>';
	 	return Redirect::to(Input::get('from'))->with('message',$message);

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