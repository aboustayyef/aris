<?php

class Section extends \Eloquent {
	protected $fillable = ['name','parentId'];


/**
 * returns a collection object of Children of category
 */
	public function children(){
		$children = $this->where('parentId', $this->id);
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