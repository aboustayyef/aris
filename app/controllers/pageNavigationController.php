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
			// if it's a subsection that only has one page, immediately show that page
			$section = Section::where('slug', $subsection)->get();
			
			// if section doesn't exist, die (for now)
			if ($section->count() == 0) {
				die('section does not exist');
			}	
			// if section only has one page, it means that the section *is* the page
			// so for example, if home/contact-us only has home/contact-us/contact-us, 
			// it will display the contact-us page.
			$section = $section->first();
			if ($section->hasOnePageOnly()) {
				$page = $section->pages()->first()->slug;
				return View::make('pages.singleView')->with(compact('page'));
			}
			// otherwise return a list of pages.
			return View::make('pages.listView')->with(compact('subsection'));
		}
	}
}