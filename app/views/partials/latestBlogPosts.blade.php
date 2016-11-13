<?php

// Prepare SimplePie

$sp = new SimplePie();
$sp->set_feed_url(
	[
		'https://arisprimaryict.wordpress.com/feed',
		'https://nikasemo.wordpress.com/feed',
		'https://parentsblog.aris.edu.gh/feed'
	]
);
$sp->set_cache_duration(1800);
$sp->set_cache_location(storage_path().'/spcache');
$sp->init();
$latestPosts = $sp->get_items(0,4);

$blog_definitions = 
[
	[
		'unique_identifier'		=>	'arisprimaryict.wordpress.com',
		'thumb_location'		=>	'https://arisprimaryict.files.wordpress.com/2016/01/arisictlogo3.png',
		'blog_title'			=>	'The Online Journal of ICT at ARIS Primary'
	],
	[
		'unique_identifier'		=>	'parentsblog.aris.edu.gh',
		'thumb_location'		=>	'/img/aris-parents-logo.png',
		'blog_title'			=>	'ARIS Parents Blog'
	],
	[
		'unique_identifier'		=>	'nikasemo.wordpress.com',
		'thumb_location'		=>	'/img/nikasemo.png',
		'blog_title'			=>	'Our Learning Experiences (Nikasemo)'
	],

]

?>

<h2 class="latestNews">
	Latest Blog Posts
</h2>

@foreach ($latestPosts as $post)
<div class="news_item_wrapper">
	@foreach($blog_definitions as $definition)
		@if( strpos($post->get_link(), $definition['unique_identifier']))
			<div class="news_item_photo">
						<img src="{{$definition['thumb_location']}}" width="45" height="auto" alt="">
			</div>
			<a href="{{$post->get_link()}}">
				<h3>{{$post->get_title()}}</h3>
			</a>
			<div class="news_excerpt">
				<p>{{$definition['blog_title']}}</p>
			</div>
		@endif
	@endforeach
</div>
@endforeach
