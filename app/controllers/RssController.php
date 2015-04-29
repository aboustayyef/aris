<?php 

	/**
	* RSS Feed of News
	*/

	class RssController extends \BaseController
	{
		
		public function index(){
			$news = Aris\News::orderBy('public_date','desc')->take(20)->get();
			$content = View::make('rss.atom', compact('news'));
			return Response::make($content, '200')->header('Content-Type', 'text/xml');
		} 
	}
?>