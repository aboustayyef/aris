<?php

class Node extends \Eloquent {
	//protected $fillable = [];b 

	public function topLevel(){
		$topLevel = $this->where('parent_id', null)->get();
		return $topLevel;
	}

	public function children(){
		$children = $this->where('parent_id', $this->id)->get();
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

	public function absoluteSlug(){
		$slug = $this->slug;
		if ($this->hasParent()) {
			$dad = $this->parent();
			$slug = $dad->slug . '/' . $slug;
			if ($dad->hasParent()) {
				$grandDad = $dad->parent();
				$slug = $grandDad->slug . '/' . $slug;
			}
		}
		return $slug;
	}

	public function getByAbsoluteSlug($slug = null){
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

}