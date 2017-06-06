<?php namespace Aris;

use \Auth;
use \Str;
class People extends \Eloquent {
	
	protected $table = 'people';
	protected $fillable = [];

	public function image(){
		$getBio = $this->bio;
		return (new ImageExtractor($getBio))->image();
	}


	public static function rules(){
		return array(
			'firstname'	=>	'required',
			'lastname'	=>	'required',
			'department' =>	'required',
			'designation'	=>	'required',
			'bio'	=> 'required',
			'type'	=>	'required'
		);

	}

	public function slug(){
		return Str::slug($this->firstname . ' ' . $this->lastname);
	}

	public function store($data){
		$this->title = $data['title'];
		$this->firstname = $data['firstname'];
		$this->lastname = $data['lastname'];
		$this->designation = $data['designation'];
		$this->department = $data['department'];
		$this->type = implode(',',$data['type']);
		$this->bio = $data['bio'];
		$this->last_edited_by = Auth::user()->email;
		$this->slug = $this->slug();
		$this->save();
		return true;
	}

	static function slugExists($slug){
		return Static::whereSlug($slug)->get()->count() > 0;
	}

}