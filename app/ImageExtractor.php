<?php namespace Aris;

 use Symfony\Component\DomCrawler\Crawler;
 
 /**
  * Extracts the first image or video poster from HTML content.
  */
 class ImageExtractor {
     private $crawler;
     private $html;
 
     function __construct($html) {
         $this->html = $html;
         $this->crawler = new Crawler();
         $this->crawler->addHtmlContent($html, 'UTF-8');
     }
 
     /**
      * Attempts to extract the first available image or video poster.
      * @return string|false URL of the image or poster, or false if none found.
      */
     public function getImageOrVideoPoster() {
         try {
             // First, try to find an image
             $image = $this->crawler->filter('img')->first()->attr('src');
             if (!empty($image)) {
                 return $image;
             }
             
             // Next, try to find a video poster
             $videoPoster = $this->getVideoPoster();
             if (!empty($videoPoster)) {
                 return $videoPoster;
             }
 
             // As a last resort, try to extract a YouTube thumbnail
             return (new YouTubeImageExtractor($this->html))->getYoutubeThumbnail();
         } catch (\Exception $e) {
             // Log the error or handle exceptions
             return false;
         }
     }
 
     /**
      * Extracts the poster attribute from the first video tag found.
      * @return string|false URL of the poster or false if none found.
      */
     private function getVideoPoster() {
         $videoPoster = $this->crawler->filter('video')->first()->attr('poster');
         return $videoPoster ?: false;
     }
 }
 
 /**
  * Handles extraction of YouTube video thumbnails.
  */
 class YouTubeImageExtractor {
     private $html;
 
     function __construct($html) {
         $this->html = $html;
     }
 
     /**
      * Extracts the thumbnail URL for a YouTube video if one is embedded.
      * @return string|false URL of the YouTube thumbnail or false if not applicable.
      */
     public function getYoutubeThumbnail() {
         preg_match('#(\\.be/|/embed/|/v/|/watch\\?v=)([A-Za-z0-9_-]{5,11})#', $this->html, $matches);
         if(isset($matches[2]) && $matches[2] != '') {
             $youtubeCode = $matches[2];
             $thumbnailUrl = 'https://img.youtube.com/vi/'.$youtubeCode.'/0.jpg';
             // Optional: Check if the thumbnail actually exists
             return $thumbnailUrl;
         }
         return false;
     }
 }
