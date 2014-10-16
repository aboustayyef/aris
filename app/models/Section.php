<?php

class Section extends \Eloquent {
	protected $fillable = ['name','parentId'];
	public $timestamps = false;

/**
 * returns a collection of the top level section
 * 	example: About Us, Curriculum, Pastoral.. etc
 */
	public function majors(){
		$majors = $this->where('parentId', null)->where('active', 1)->get();
		return $majors;
	}

/**
 * returns a collection object of Children of category
 */
	public function children(){
		$children = $this->where('parentId', $this->id)->get();
		if ($children->count() > 0) {
			return $children;
		} else {
			return false;
		}
	}

/**
 *	Returns a Section Object of the parent id
 */
	public function dad(){
		$dad = self::find($this->parentId);
		return $dad;
	}
}