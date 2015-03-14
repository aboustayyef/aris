<?php 

	/**
	* RSS Feed of News
	*/

	class RssController extends \BaseController
	{
		
		public function index(){
			$news = Aris\News::orderBy('public_date','desc')->take(20)->get();
			return View::make('rss.atom', compact('news'));
		} 
	}
?>