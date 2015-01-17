<?php namespace Aris ;

use \SimplePie;
use Symfony\Component\DomCrawler\Crawler ;

class NewsArticles{

	private $feed;

	public function __construct(){
	    // Initiate Simple Pie instance for feed
	    $this->feed = new SimplePie(); // We'll process this feed with all of the default options.
	    $this->feed->set_feed_url('http://news.aris.edu.gh/feed'); // Set which feed to process.
	    $this->feed->strip_htmltags(false);
	    $this->feed->enable_cache(false);
	    $this->feed->init(); // Run SimplePie.
	    $this->feed->handle_content_type();
	}

	public function get($n = 0){
		$collection = [];
		$all = $this->feed->get_items(0,$n);
		foreach ($all as $key => $article) {
			$collection[] = new Article($article);
		}
		return $collection;
	}

}
// This is a wrapper around the Simple Pie Article object
class Article{
	private $original;
	public function __construct($simplePieArticle){
		$this->original = $simplePieArticle;
	}

	public function title(){
		return $this->original->get_title();
	}

	public function content(){
		return $this->original->get_content();
	}

	public function image(){
		$crawler = new Crawler($this->original->get_content());
    	//$crawler->addHTMLContent(file_get_contents($this->original->get_content(), 'UTF-8'));
    	$count = $imageSrc = $crawler->filter('img')->count();
    	if ($count > 0) {
    		$imageSrc = $crawler->filter('img')->first()->attr('src');
    		if (!empty($imageSrc)) {
	    		return $imageSrc;
	    	}
    	}
    	return false;
	}

	public function link(){
		return $this->original->get_permalink();
	}

	public function date(){
		return new \Carbon\Carbon($this->original->get_date());
	}

	public function excerpt(){
		return trim(str_limit(strip_tags($this->content()), 220));
	}
}