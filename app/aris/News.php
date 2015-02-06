<?php namespace Aris;

use \Eloquent;

Class News extends Eloquent{
	
	protected $table = "news";


	public function image(){
		$getContent = $this->content;
		return (new ImageExtractor($getContent))->image();
	}

	public function excerpt(){
		// if the manual excerpt is empty, generate one.
		if (trim($this->excerpt) == "") {
			return str_limit(strip_tags($this->content), 220);
		}
		return $this->excerpt;
	}
	
	public static function rules(){
		return array(
			'title'	=>	'required|min:5',
			'content'	=>	'required|min:10'
		);
	}

}

?>