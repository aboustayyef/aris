<?php

namespace Aris\Http\Controllers;

use Illuminate\Http\Request;
use Aris\News;
use Illuminate\Support\Facades\Auth;


class NewsController extends Controller
{
public function index()
	{
		$news = News::orderBy('public_date','desc')->paginate(8);
		return view('news.index')->with('news',$news)->with('title', 'ARIS News');
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
			return view('news.create');
		}else{
			return redirect('login');
		}
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
	public function show($slug)
	{
		// first, convert slug $id to real id
		
		$news = News::where('slug', $slug)->get();
		if ($news->count() > 0) {
			$newsItem = $news->first();
			return view('news.show')->with('newsItem',$newsItem)->with('title', 'Aris News: '.$newsItem->title);
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
			return view('news.edit')->with('news', $news);
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
			return redirect(Input::get('from'))->with('message','Successfully edited story');
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
		return redirect(Input::get('from'))->with('message','Successfully deleted news item');
	}
}
