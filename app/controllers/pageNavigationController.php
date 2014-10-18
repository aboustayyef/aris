<?php

class PageNavigationController extends \BaseController {

	/**
	 * Resolves which page to show from url
	 */
	public function resolve($section, $subsection, $page=null)
	{
		if ($page) {
			return View::make('pages.singleView')->with(compact('page'));
		} else {
			return View::make('pages.listView')->with(compact('subsection'));
		}
	}
}