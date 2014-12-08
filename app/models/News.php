<?php
use Symfony\Component\DomCrawler\Crawler;

class News extends \Eloquent {
	protected $fillable = [];

	public function hasImage(){
		if (!empty($this->featured_image)) {
			return true;
		}
		return false;
	}

    public static function rules(){
        return array(
            'title' =>  'required|min:5',
            'content'   =>  'required|min:10',
            'date'  => 'required|date'
        );
    }

    public static function slugExists($slug){
        $newsitems = News::where('slug',$slug)->get()->count();
        if ($newsitems > 0) {
            return true;
        }
        return false;
    }

    public function slug(){
        // if slug exists, return it, otherwise create one from date and title
        if (!empty($this->slug)) {
            return $this->slug;
        }
        // format: YYYY-monthname-slug
        $slug ='';
        $date = new Carbon\Carbon($this->date);
        $year = $date->format('Y');
        $nameOfMonth = strtolower($date->format('F'));
        $slug = $year.'-'.$nameOfMonth.'-'.Str::slug($this->title);

        // check if slug exists, or append numeral
        $counter = 0;
        $baseSlug = $slug;
        while (News::slugExists($slug)) {
            $counter++;
            $slug = $baseSlug . '-'.$counter;
        }
        return $slug;
    }

    public function excerpt(){
        // if excerpt exists, return it, otherwise create one from date and title
        if (!empty($this->excerpt)) {
            return $this->excerpt;
        }

        // otherwise, get first paragraph from content
        $crawler = new Crawler($this->content);
        $excerptCrawler = $crawler->filter('p');
        foreach ($excerptCrawler as $key => $paragraph) {
            $paragraphCrawler = new Crawler($paragraph);
            // see if paragraph has an image
            $imageCrawler = $paragraphCrawler->filter('img');
            if ($imageCrawler->count() == 0) {
                return $paragraphCrawler->text();
            }
        }
        return ' ';
    }

    public function getFeaturedImage(){
        // code to extract featured image from content
        $content = $this->content;

        // get all images from content
        $contentCrawler = new Crawler($content);
        $imageCrawler = $contentCrawler->filter('img');
        if ($imageCrawler->count() > 0) {
            //get first image
            $image = $imageCrawler->first()->attr('src');
            return $image;
        }
        return null;
    }
}

