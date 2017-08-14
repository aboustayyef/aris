<?php namespace Aris;
use \Str;
use \Eloquent;
use \Carbon\Carbon;
use \Auth;

Class News extends Eloquent implements \Spatie\Feed\FeedItem {
	
	protected $table = "news";

	public static function getLatest($n = 10){
		return Static::orderBy('public_date','desc')->take($n)->get();
	}

	public function image(){
		if ( ! cache('newsImage_' . $this->id)) {
			$getContent = $this->content;
			cache(['newsImage_' . $this->id => (new ImageExtractor($getContent))->image() ], 5000);
		}
		return cache('newsImage_' . $this->id) ;
	}

	public static function rules(){
		return array(
			'title'	=>	'required|min:5',
			'content'	=>	'required|min:10',
			'date'	=> 'required|date_format:Y-m-d'
		);
	}

	public function store($data){
		$date = new Carbon($data['date']);
		$this->title = $data['title'];
		$this->content = $data['content'];
		$this->last_edited_by = Auth::user()->email;
		$this->public_date = $date;
		$this->excerpt = str_limit(strip_tags($this->content), 220);
		$this->created_at = new Carbon;
		
		// set slug only if empty, because slugs shouldn't be changed after editing
		if (empty($this->slug)) {
			$this->slug = strtolower($this->created_at->format('Y-F')).'-'.str_slug($this->title,'-');
		}
		
		$this->save();
		return true;

	}

	public function getFeedItems($n = 20){
		return News::orderBy('public_date','desc')->take($n)->get();
	}

    public function getFeedItemId(){
    	return $this->id;
    }

    public function getFeedItemTitle(){
    	return $this->title;
    }

    public function getFeedItemUpdated(){
    	return $this->updated_at;
    }

    public function getFeedItemSummary(){
    	// convert relative img urls to absolute urls
    	$dest = '<img src="' . env('WEB_ROOT') . 'img';
    	$content = preg_replace("#<img src((\\s+)?=(\\s+)?\"//img)#um", "$dest", $this->content );
    	return $content;
    }

    public function getFeedItemLink(){
    	return env('WEB_ROOT') . '/news/' . $this->slug;
    }

    public function getFeedItemAuthor(){
    	return 'Aris Staff';
    }

}

?>