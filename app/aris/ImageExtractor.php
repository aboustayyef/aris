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
            return false;
        }

    }

 ?>