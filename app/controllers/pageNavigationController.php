<?php

class PageNavigationController extends \BaseController {

	/**
	 * Resolves which page to show from url
	 */
	public function resolve($section, $sub, $page=null)
	{
		/**
		*	If $page is set, it means we are going exactly to that page 
		*/
		if ($page) {
			
			return View::make('pages.singleView')->with(compact('page'));
		
		} else {
		/**
		 * Otherwise, we try to know is subsection behaves as a directory or a page
		 */
			$subsection = Section::where('slug', $sub)->get();
			
			// if section doesn't exist, die (for now)
			if ($subsection->count() == 0) {
				die('Subsection does not exist');
			}	

			// if section only has one page, it means that the section *is* the page
			// it will immediately display the page, not a list of pages with only one entry

			$subsection = $subsection->first();
			if ($subsection->hasOnePageOnly()) {
				$page = $subsection->pages()->first()->slug;
				return View::make('pages.singleView')->with(compact('page'));
			}
			// otherwise return a list of pages.
			return View::make('pages.listView')->with('subsection', $sub);
		}
	}
}