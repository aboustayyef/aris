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

	public function create()
	{
		$parents = collect();
		$sections = (new Node)->topLevel();
		foreach ($sections as $section) {
			$parents->push(['id'=>$section->id, 'name'=>$section->name]);
			foreach ($section->children() as $subsection) {
				$parents->push(['id' => $subsection->id, 'name'=> "├ $subsection->name"]);
			}
			$parents->push('divider');
		}
		return view('nodes.create')->with('node', New Node)->with('parents', $parents);
	}

	public function store(Request $request){
		$this->validate($request, Node::validationRules());

		$new_node = new Node;
		$new_node->name = $request->name;
		$new_node->content = $request->content;
		$new_node->parent_id = (int) $request->parent_id;
		$new_node->last_edited_by = \Auth::user()->email;
		// work out the slug and path
		$new_node->slug = str_slug($request->name);
		$parent = Node::find($new_node->parent_id);
		$new_node->path = $parent->path . '/' . $new_node->slug;

		if($new_node->save()){
			\Cache::forget('navigation_menu');
			return redirect()->to('/')->with('message','Successfully added a new Page');
		}
		
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
