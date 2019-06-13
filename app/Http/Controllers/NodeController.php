<?php

namespace Aris\Http\Controllers;

use Aris\Node;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class NodeController extends Controller
{
    public function __construct()
    {
    	$this->middleware('auth');
    }

    public function edit(Node $node){
    	return view('nodes.edit')->with(compact('node'));
    }

    public function update(Request $request, Node $node){
    	$this->validate($request, [
    		'name'	=>	'required|min:5',	
    		'content'	=>	'required|min:15'
    	]);

    	$node->name = $request->get('name');
		$node->content = $request->get('content');
		
		$node->slug = str_slug($request->get('name'));
		
		$old_path = $node->path; // will be changed

		if ($node->parent()) {
			$node->path = $node->parent()->path . '/' . $node->slug;
		}else{
			$node->path = $node->slug;
		}

		$node->save();

		// Some nodes are redirect nodes and potentially redirect to this one 
		// Make sure those are updated as well.
		
		$potential_redirecting_nodes = Node::where('slug', $old_path)->get();

		foreach ($potential_redirecting_nodes as $key => $n) {
			$n->path = $node->path;
			$n->slug = $node->path;
			$n->name = $node->name;
			$n->save();	
		}

		// clear cache for generated menu
		Cache::forget('navigation_menu');

    	return redirect($node->path)->with('message', 'succesfully edited page');

    }

    public function destroy(Request $request, Node $node)
	{
		$node->delete();
		cache()->flush(); // to regenerate the navigation menu without deleted item
		return redirect('/')->with('message','Successfully deleted Page');
	}

}
