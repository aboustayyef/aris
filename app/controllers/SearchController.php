<?php
use Aris\Node;
class SearchController extends \BaseController {

	/**
	 * Resolves which page to show from url
	 */
	public function index()
	{
		if (Input::has('query')) {
			$query = Input::get('query');
			//return 'You have searched for '.Input::get('query');
			$results = Node::whereRaw("MATCH(name,content) AGAINST(? IN BOOLEAN MODE)", array($query))->remember(1440)->orderBy('parent_id','ASC')->get();
			if ($results->count() > 0) {
				return View::make('search.main')->with('results',$results)->with('query', $query)->with('title', 'Search Result for '.$query);
			} else {
				return '<h3>Sorry, No results for ' . $query . ' </h3>';
			}
		}
		return Redirect::to('/');
	}
}