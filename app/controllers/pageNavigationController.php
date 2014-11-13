<?php

class PageNavigationController extends \BaseController {

	/**
	 * Resolves which page to show from url
	 */
	public function resolve($section, $sub=null, $page=null)
	{
		
		// build the full slug as a string

		$absoluteSlug = $section;
		if ($sub) {
			$absoluteSlug .= '/' . $sub;
			if ($page) {
				$absoluteSlug .= '/' . $page;
			}
		}

		if ($node = (New Node)->getByAbsoluteSlug($absoluteSlug)) {
			if ($node->hasChildren()) {
				return View::make('pages.listView')->with(compact('node'))->with('title', 'ARIS - ' . $node->name);
			}
			return View::make('pages.singleView')->with(compact('node'))->with('title', 'ARIS - ' . $node->name);
		}

		app::abort('404');

	}
}