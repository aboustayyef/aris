<?php

class SearchController extends \BaseController {

	/**
	 * Resolves which page to show from url
	 */
	public function index()
	{
		if (Input::has('query')) {
			$query = Input::get('query');
			//return 'You have searched for '.Input::get('query');
			$results = Node::whereRaw("MATCH(name,content) AGAINST(? IN BOOLEAN MODE)", array($query))->remember(1440)->get();
			if ($results->count() > 0) {
				echo '<ul>';
				foreach ($results as $key => $result) {
					echo "<li>$result->name</li>";
				}
				echo '</ul>';
				die();
			} else {
				return '<h3>Sorry, No results for ' . $query . ' </h3>';
			}
		}
		return Redirect::to('/');
	}
}