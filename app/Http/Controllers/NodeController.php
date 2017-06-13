<?php

namespace Aris\Http\Controllers;

use Aris\Node;
use Illuminate\Http\Request;

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
    	$node->save();

    	return redirect($request->get('from'))->with('message', 'succesfully edited page');

    }

    public function destroy(Request $request, Node $node)
	{
		$node->delete();
		cache()->flush(); // to regenerate the navigation menu without deleted item
		return redirect('/')->with('message','Successfully deleted Page');
	}

}
