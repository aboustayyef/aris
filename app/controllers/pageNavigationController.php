<?php

class PageNavigationController extends \BaseController {

	/**
	 * Resolves which page to show from url
	 */
	public function resolve($section, $sub=null, $page=null)
	{
		/**
		*	If $page is set, it means we are going exactly to that page 
		*/
		if ($page) {

			$pageExists = Page::where('slug', $page)->get()->count();
			if ($pageExists > 0) {
				$page = Page::where('slug', $page)->first();
				$title = $page->title;
			} else {
				app::abort('404');
			}
			
			return View::make('pages.singleView')->with(compact('page'))->with('title', 'ARIS - ' . $title);
		
		} else {
			if ($sub) {
				/**
				 * Otherwise, we try to know is subsection behaves as a directory or a page
				 */
					$subsection = Section::where('slug', $sub)->get();
					
					// if section doesn't exist, die (for now)
					if ($subsection->count() == 0) {
						app::abort('404');
					}	

					// if section only has one page, it means that the section *is* the page
					// it will immediately display the page, not a list of pages with only one entry

					$subsection = $subsection->first();
					
					if ($subsection->hasOnePageOnly()) {
						$page = $subsection->children()->first();
						$title = $subsection->children()->first()->title;
						return View::make('pages.singleView')->with(compact('page'))->with('title', 'Aris - ' . $title);
					}

					// otherwise return a list of pages.
					$section = Section::where('slug', $sub)->first();
					$title = $section->name;
					return View::make('pages.listView')->with('section', $section)->with('title', 'Aris - ' . $title);
			} else {
				$section = Section::where('slug', $section)->get();
				if ($section->count() == 0) {
					die('Section Does not exist');
				};
				// otherwise return a list of pages.
				$section = $section->first()->slug;
				return View::make('pages.listView')->with('subsection', $section);
			}
				
		}
	}
}