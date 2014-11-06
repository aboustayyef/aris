<?php

class Page extends \Eloquent {
	protected $fillable = ['title','slug','section_id', 'content'];

	public function section(){
		return $this->belongsTo('Section');
	}

	public static function rules(){
		return array(
			'title'	=>	'required|min:5',
			'content'	=>	'required|min:10'
		);
	}

/**
 * returns the absolute url to the page
 */
	public function url(){
		$me_slug = $this->slug;
		$dad = Section::find($this->section_id);
		$dad_slug = $dad->slug;
		$grandad = Section::find($dad->parentId);
		$grandad_slug = $grandad->slug;
		return '/'.$grandad_slug.'/'.$dad_slug.'/'.$me_slug;
	}

}