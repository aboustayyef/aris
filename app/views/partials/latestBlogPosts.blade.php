<?php

// Prepare SimplePie

$sp = new SimplePie();
$sp->set_feed_url(['https://arisprimaryict.wordpress.com/feed', 'https://nikasemo.wordpress.com/feed']);
$sp->set_cache_duration(1800);
$sp->set_cache_location(storage_path().'/spcache');
$sp->init();
$latestPosts = $sp->get_items(0,4);
?>

<h2 class="latestNews">
	Latest Blog Posts
</h2>

@foreach ($latestPosts as $post)
<div class="news_item_wrapper">
<div class="news_item_photo">
	@if( strpos($post->get_link(), 'arisprimaryict.wordpress.com'))
		<img src="https://arisprimaryict.files.wordpress.com/2016/01/arisictlogo3.png" width="60" height="auto" alt="">
	@else
		<img src="/img/wordpress-logo.png" width="60" height="auto" alt="wordpress logo">
	@endif
</div>
	<a href="{{$post->get_link()}}">
		<h3>{{$post->get_title()}}</h3>
	</a>
	<div class="news_excerpt">
		<p>{{$sp->get_title()}}</p>
	</div>
</div>
@endforeach
