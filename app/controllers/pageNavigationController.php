<?php
use Aris\Node;
class PageNavigationController extends \BaseController {

	/**
	 * Resolves which page to show from url
	 */
	public function resolve($section, $sub=null, $page=null, $subpage=null)
	{

		// build the full slug as a string

		$absoluteSlug = $section;
		if ($sub) {
			$absoluteSlug .= '/' . $sub;
			if ($page) {
				$absoluteSlug .= '/' . $page;
				if ($subpage) {
					$absoluteSlug .= '/' . $subpage;
				}
			}
		}

		if ($node = (New Node)->getByAbsoluteSlug($absoluteSlug)) {

			// Check if Node has a role
			if ($node->role) {
				if (Session::has('aris_role')) {
					if (Session::get('aris_role')->shortname == $node->role) {
						# a-ok!
					} else {
						return Redirect::to('/rolelogin/create?role=' . $node->role . '&return=' . urlencode($absoluteSlug));
					}
				} else {
					return Redirect::to('/rolelogin/create?role=' . $node->role . '&return=' . urlencode($absoluteSlug));
				}
			}

			if ($node->hasChildren()) {
				return View::make('pages.listView')->with(compact('node'));
			}
			return View::make('pages.singleView')->with(compact('node'));
		}

		app::abort('404');

	}
}