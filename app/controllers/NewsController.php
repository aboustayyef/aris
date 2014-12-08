<?php

class NewsController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 * GET /news
	 *
	 * @return Response
	 */
	public function index()
	{
		$news = News::all();
		return View::make('news.index')->with('news',$news)->with('title','ARIS News');
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /news/create
	 *
	 * @return Response
	 */
	public function create()
	{
		if ( Auth::check()) {
			return View::make('news.create');
		} else {
			return Redirect::to('login');
		}

	}

	/**
	 * Store a newly created resource in storage.
	 * POST /news
	 *
	 * @return Response
	 */
	public function store()
	{
		$v = Validator::make(Input::all(), News::rules());
		if ($v->fails()) {
			return Redirect::route('news.create')->withErrors($v)->withInput();
		}
		$news = new News;
		$news->title =
		$news->title = Input::get('title');
		$news->slug = $news->slug();
		$news->content = Input::get('content');
		$news->excerpt = $news->excerpt();
		$news->date = Input::get('date');
		$news->featured_image = $news->getFeaturedImage();
		$news->save();
		return Redirect::to('/news')->with('message','You have succesfully created a new page');
	}
	/**
	 * Display the specified resource.
	 * GET /news/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($slug)
	{
		if (News::where('slug', $slug)->get()->count() > 0 ) {
				$news = News::where('slug', $slug)->get()->first();
				return View::make('news.show')->with('news',$news)->with('title', 'ARIS News | ' . $news->title);
		}
		app::abort('404');
	}

	/**
	 * Show the form for editing the specified resource.
	 * GET /news/{id}/edit
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
	 * PUT /news/{id}
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
	 * DELETE /news/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}