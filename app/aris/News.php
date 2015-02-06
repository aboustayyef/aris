<?php namespace Aris;

use \Eloquent;

Class News extends Eloquent{
	
	protected $table = "news";

	
	public static function rules(){
		return array(
			'title'	=>	'required|min:5',
			'content'	=>	'required|min:10'
		);
	}

}

?>