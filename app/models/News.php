<?php

class News extends \Eloquent {
	protected $fillable = [];

	public function hasImage(){
		if (!empty($this->featured_image)) {
			return true;
		}
		return false;
	}
}

