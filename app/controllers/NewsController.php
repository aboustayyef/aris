<?php

use Aris\News;

class NewsController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 * GET /news
	 *
	 * @return Response
	 */
	public function index()
	{
		$news = News::orderBy('public_date','desc')->paginate(8);
		return View::make('News.index')->with('news',$news)->with('title', 'ARIS News');
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /news/create
	 *
	 * @return Response
	 */
	public function create()
	{
		if (Auth::check()) {
			return View::make('News.create');
		}else{
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
		// $node = new Node;
		$news = new News;
		if ($news->store(Input::all())) {
			return Redirect::route('news.index')->with('message','Successfully created news item');
		}

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
		// first, convert slug $id to real id
		
		$news = News::where('slug', $slug)->get();
		if ($news->count() > 0) {
			$newsItem = $news->first();
			return View::make('News.show')->with('newsItem',$newsItem)->with('title', 'Aris News: '.$newsItem->title);
		}
		return Response::make('Sorry, page does not exist',404);

		
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
		$news = News::find($id);
		if ($news) {
			return View::make('News.edit')->with('news', $news);
		}
		return Response::make('Sorry, page does not exist',404);
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
		$v = Validator::make(Input::all(), News::rules());
		if ($v->fails()) {
			return Redirect::route('news.edit', $id)->withErrors($v)->withInput();
		}
		$news = News::find($id);
		if ($news->store(Input::all())) {
			return Redirect::to(Input::get('from'))->with('message','Successfully edited story');
		}

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
		$news = News::find($id);
		$news->delete();
		return Redirect::to(Input::get('from'))->with('message','Successfully deleted news item');
	}

}