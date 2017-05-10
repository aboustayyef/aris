<?php

namespace Aris\Http\Controllers;
use Aris\Node;

use Illuminate\Http\Request;
use \Session;
use \Redirect;

class pageNavigationController extends Controller
{

	public function __construct(){
		$this->middleware('role');
	}

    /**
	 * Resolves which page to show from url
	 */
	public function resolve(Request $request)
	{

		// build the full slug as a string

		$path = $request->path();
		$node = (new Node)->getByPath($path);
		if ($node) {
			if ($node->hasChildren()) {
			return view('pages.listView')->with(compact('node'));			
		}
		
			return view('pages.singleView')->with(compact('node'));
		}
		// return response('Page Does Not Exist', 404);
	}
}
