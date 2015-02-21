<?php namespace Aris;

use \Auth;
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
			'designation'	=>	'required',
			'bio'	=> 'required',
			'type'	=>	'required'
		);

	}

	public function store($data){
		$this->title = $data['title'];
		$this->firstname = $data['firstname'];
		$this->lastname = $data['lastname'];
		$this->designation = $data['designation'];
		$this->type = implode(',',$data['type']);
		$this->bio = $data['bio'];
		$this->last_edited_by = Auth::user()->email;
		$this->save();
		return true;
	}

}