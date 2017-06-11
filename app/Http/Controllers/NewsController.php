<?php

namespace Aris\Http\Controllers;

use Illuminate\Http\Request;
use Aris\News;
use Illuminate\Support\Facades\Auth;


class NewsController extends Controller
{

public function __construct(){
	$this->middleware('auth')->except(['index', 'show']);
}

public function index(Request $request)
	{
		$news = News::orderBy('public_date','desc')->paginate(8);
		return view('news.index')->with('news',$news)->with('title', 'ARIS News')->with('request', $request);
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /news/create
	 *
	 * @return Response
	 */
	public function create(Request $request)
	{
		return view('news.create', ['news' => new News, 'request' => $request]);
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /news
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{
		$this->validate($request, [
			'title'	=>	'required|min:5',
			'content'	=>	'required|min:10',
			'date'	=> 'required|date_format:Y-m-d'
		]);

		$news = new News;
		if ($news->store($request->all())) {
			return redirect(route('news.index'))->with('message','Successfully created news item');
		}

	}

	/**
	 * Display the specified resource.
	 * GET /news/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($slug, Request $request)
	{
		// first, convert slug $id to real id
		
		$news = News::where('slug', $slug)->get();
		if ($news->count() > 0) {
			$newsItem = $news->first();
			return view('news.show')->with('newsItem',$newsItem)->with('title', 'Aris News: '.$newsItem->title)->with('request', $request);
		}
		return response('Sorry, page does not exist',404);

		
	}

	/**
	 * Show the form for editing the specified resource.
	 * GET /news/{id}/edit
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit(News $news, Request $request)
	{
		return view('news.edit')->with(['news' => $news, 'request' => $request]);
	}

	/**
	 * Update the specified resource in storage.
	 * PUT /news/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update(News $news, Request $request)
	{
		$this->validate($request, [
			'title'	=>	'required|min:5',
			'content'	=>	'required|min:10',
			'date'	=> 'required|date_format:Y-m-d'
		]);

		if ($news->store($request->all())) {
			return redirect($request->get('from'))->with('message','Successfully edited story');
		}

	}

	/**
	 * Remove the specified resource from storage.
	 * DELETE /news/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy(News $news, Request $request)
	{
		$news->delete();

		return redirect('news')->with('message','Successfully deleted story');
	}
}
