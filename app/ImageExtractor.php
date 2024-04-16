<?php namespace Aris;

use Symfony\Component\DomCrawler\Crawler ;

    /**
    * Extracts first image from HTML content
    */
    class ImageExtractor
    {
        private $crawler;
        function __construct($html)
        {
            $this->html = $html;
            $this->crawler = new Crawler($html);
        }

        public function image(){
            //$crawler->addHTMLContent(file_get_contents($this->original->get_content(), 'UTF-8'));
            $count = $imageSrc = $this->crawler->filter('img')->count();
            if ($count > 0) {
                $imageSrc = $this->crawler->filter('img')->first()->attr('src');
                if (!empty($imageSrc)) {
                    return $imageSrc;
                }
            }
            // If no image returned, try to find an embedded youtube video
            return (new YouTubeImageExtractor($this->html))->youtubeImage();
        }

    }

    class YouTubeImageExtractor{

        private $html;
        function __construct($html)
        {
            $this->html = $html;
        }

        public function youtubeImage(){
            preg_match('#(\.be/|/embed/|/v/|/watch\?v=)([A-Za-z0-9_-]{5,11})#', $this->html, $matches);
            if(isset($matches[2]) && $matches[2] != '')
            {
                $YoutubeCode = $matches[2];
                $candidate = 'https://img.youtube.com/vi/'.$YoutubeCode.'/0.jpg';
                // check if image still exists
                if (@getimagesize($candidate))
                {
                  return $candidate;
                }
            }
            return false;
        }
    }

 ?>