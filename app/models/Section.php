<?php

class Section extends \Eloquent {
	protected $fillable = ['name','parentId'];
	public $timestamps = false;

	public function pages(){
		return $this->hasMany('Page');
	}

	public function hasOnePageOnly(){
		if ($this->pages()->count() == 1) {
			return true;
		} else {
			return false;
		}
	}
/**
 * returns a collection of the top level section
 * 	example: About Us, Curriculum, Pastoral.. etc
 */
	public function sections(){
		$sections = $this->where('parentId', null)->where('active', 1)->get();
		return $sections;
	}

/**
 * returns a collection object of Children of category
 */
	public function subsections(){
		$subsections = $this->where('parentId', $this->id)->get();
		if ($subsections->count() > 0) {
			return $subsections;
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

/**
 * Returns the absolute url to this section
 */
	public function url(){
		return '/'.$this->dad()->slug.'/'.$this->slug;
	}
	
}