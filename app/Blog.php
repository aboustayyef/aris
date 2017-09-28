<?php

namespace Aris;
/*
This class simply returns the latest blog posts related to ARIS
 */
class Blog
{
    public static function getLatest($howmany= 3)
    {
        // Prepare SimplePie
        $posts =[];
        $sp = new \SimplePie();
        $sp->set_feed_url(
            [
                'https://arisprimaryict.com/feed',
                'https://nikasemo.wordpress.com/feed',
                'https://parentsblog.aris.edu.gh/feed'
            ]
        );
        $sp->set_cache_duration(1800);
        $sp->set_cache_location(storage_path().'/spcache');
        $sp->init();
        $latestPosts = $sp->get_items(0, $howmany);

        $blog_definitions = 
        [
            [
                'unique_identifier'     =>  'arisprimaryict.com',
                'thumb_location'        =>  'https://arisprimaryict.files.wordpress.com/2016/01/arisictlogo3.png',
                'blog_title'            =>  'The Online Journal of ICT at ARIS Primary'
            ],
            [
                'unique_identifier'     =>  'parentsblog.aris.edu.gh',
                'thumb_location'        =>  '/img/aris-parents-logo.png',
                'blog_title'            =>  'ARIS Parents Blog'
            ],
            [
                'unique_identifier'     =>  'nikasemo.wordpress.com',
                'thumb_location'        =>  '/img/nikasemo.png',
                'blog_title'            =>  'Our Learning Experiences (Nikasemo)'
            ],
        ];

        foreach ($latestPosts as $key => $post) {
            $posts[$key]['title'] = $post->get_title();
            $posts[$key]['link'] = $post->get_link();
            foreach ($blog_definitions as $definition) {
                if (strpos($post->get_link(), $definition['unique_identifier'])) {
                    $posts[$key]['thumb'] = $definition['thumb_location'];
                    $posts[$key]['blog title'] = $definition['blog_title'];
                }   
            }
        }
        return $posts;
    }
}
