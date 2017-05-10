<?php

namespace Aris\Http\Controllers;

use Illuminate\Http\Request;
use Aris\Node;
use Aris\News;
use Aris\People;

class SearchController extends Controller
{
    /**
	 * Resolves which page to show from url
	 */
	public function index(Request $request)
	{
		if ($request->has('query')) {
			$query = $request->get('query');
			//return 'You have searched for '.Input::get('query');
			$pageResults = Node::whereRaw("MATCH(name,content) AGAINST(? IN BOOLEAN MODE)", array($query))->orderBy('parent_id','ASC')->get();
			$newsResults = News::whereRaw("MATCH(title,content) AGAINST(? IN BOOLEAN MODE)", array($query))->orderBy('created_at','DESC')->get();
			$peopleResults = People::whereRaw("MATCH(bio) AGAINST(? IN BOOLEAN MODE)", array($query))->orderBy('lastname','ASC')->get();
			if ( ($pageResults->count() > 0) || ($newsResults->count() > 0) || ($peopleResults->count() > 0) ){
				return view('search.main')->with(array(
					'query'			=>	$query,
					'pageResults'	=>	$pageResults,
					'peopleResults' =>	$peopleResults,
					'newsResults'	=>	$newsResults));
			} else {
				return '<h3>Sorry, We could not find any results for ' . $query . ' </h3>';
			}
		}
		return Redirect::to('/');
	}
}
