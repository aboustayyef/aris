<?php namespace Aris;
use \Str;
use \Eloquent;

Class News extends Eloquent{
	
	protected $table = "news";


	public function image(){
		$getContent = $this->content;
		return (new ImageExtractor($getContent))->image();
	}

	public function excerpt(){
		// if the manual excerpt is empty, generate one.
		if (!isset($this->excerpt)) {
			return str_limit(strip_tags($this->content), 220);
		}

		if (trim($this->excerpt) == "") {
				return str_limit(strip_tags($this->content), 220);
		}
			
		return $this->excerpt; 
	}


	public function generateSlug(){
		$this->slug = strtolower($this->created_at->format('Y-F')).'-'.Str::slug($this->title);
		$this->save();
	}

	public function generateExcerpt(){
		$this->excerpt = str_limit(strip_tags($this->content), 220);
		$this->save();
	}

	public static function rules(){
		return array(
			'title'	=>	'required|min:5',
			'content'	=>	'required|min:10'
		);
	}

	public function store($data){
		$this->title = $data['title'];
		$this->excerpt = $this->excerpt();
		$this->content = $data['content'];
		$this->save();

		$this->generateSlug();
		$this->generateExcerpt();
		return true;

	}

}

?>