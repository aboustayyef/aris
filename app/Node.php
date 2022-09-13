<?php

namespace Aris;

use Illuminate\Database\Eloquent\Model;
use \Exception;


class Node extends Model
{
	protected $fillable = ['parent_it','name','content'];
	
    public function topLevel(){
		$topLevel = $this->where('parent_id', null)->get();
		return $topLevel;
	}

	public function children(){
		$children = $this->where('parent_id', $this->id)->orderBy('name','asc')->get();
		return $children;
	}

	public function hasChildren(){
		return $this->children()->count();
	}

	public function parent(){
		if ($this->parent_id) {
			return $this->where('id', $this->parent_id)->first();
		}
		return false;
	}

	public function hasParent(){
		return $this->parent();
	}

	public function excerpt(){
		// if the manual excerpt is empty, generate one.
		if (trim($this->excerpt) == "") {
			return str_limit(strip_tags($this->content), 220);
		}
		return $this->excerpt;
	}

	public function siblings(){
		if ($this->hasParent()) {
			return $this->parent()->children();
		}
		return $this->topLevel();
	}

	public function absoluteSlug(){
		$node = $this;
		$slug = $node->slug;
		while ($node->hasParent()) {
			$node = $node->parent();
			$slug = $node->slug . '/' . $slug;
		}
		return $slug;
	}
	public function getPath(){

		// redirect paths are the same as the node
		if ($this->type == 'redirect') {
			return $this->slug;
		}

		// otherwise
		$path ='';
		$currentNode = $this;
		while ($currentNode->hasParent()) {
			$path = '/' . $currentNode->slug . $path;
			$currentNode = $currentNode->parent();
		}
		$path = '/' . $currentNode->slug . $path;

		if ($path == '') {
			return $this->slug;
		}
		return ltrim($path,'/');
	}

	public function image(){
		$getContent = $this->content;
		return (new ImageExtractor($getContent))->image();
	}

	public function getLink(){
	// 'redirect' nodes go straight to the absolute slug in the database,
	// normal node use absoluteSlug() function to build slug
		if ($this->type == 'redirect') {
			return $this->slug;
		}
		return $this->absoluteSlug();
	}


	public function getByAbsoluteSlug__old($slug = null){
		$parts = explode('/', $slug);

		$section = $this->where('slug', $parts[0])->where('parent_id', null)->first();
		if ($section)
		{
			if (!empty($parts[1]))
			{
				$subsection = $this->where('slug', $parts[1])->where('parent_id', $section->id)->first();
				if (!empty($parts[2]))
				{
					$page = $this->where('slug', $parts[2])->where('parent_id', $subsection->id)->first();
					if ($page)
					{
						return $page;
					}
				}
				return $subsection;
			}
			return $section;
		}
		return false;
	}

	public function hasRole()
	{
		return $this->role != Null;
	}

	// deprecated
	public function getByAbsoluteSlug($slug = null){
		$parts = explode('/', $slug);
		$parts = array_reverse($parts);
		
		// how many nodes exist with a slug for the final part of the Absolute Path?
		$possible_nodes_for_slug = $this->where('slug', $parts[0])->get();
		
		// if there's only one option, return that node
		if ($possible_nodes_for_slug->count() == 1) {
			return $possible_nodes_for_slug->first();
		}

		// if there's more, we check the parent page. 
		// We are making the assumption that it is not possible to 
		// have two pages where the final slug and its parent slug are the same
		
		$parentId = $this->where('slug', $parts[1])->get()->first()->id;
		return $this->where(['slug'=>$parts[0], 'parent_id'=>$parentId])->first();

	}

	public function getByPath($path){
		$nodeCollection = $this->where('path', $path)->where('type','normal')->get();
		if (count($nodeCollection) > 0) {
			return $nodeCollection->first();
		} else { // node not found
			return false;
		}
	}

	public static function rules(){
		return array(
			'title'	=>	'required|min:5',
			'content'	=>	'required|min:10'
		);
	}


	public static function validationRules(){
		return array(
			'name'	=>	'required',
			'content' => 'required'
		);

	}

}
