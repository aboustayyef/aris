<?php use Aris\News ; ?>
<aside id="content-sidebar">
	<!-- Navigation of sibling sections -->
	<div class="box siblings">
		@include('partials.quickAccess')
	</div>
	<div class="box siblings">
			<?php
				if ($node->hasParent()) {

					echo '<div class="box_header"><h3>' . $node->parent()->name . '</h3></div>';
				}
				echo '<div class="box_body"><ul>';
				$siblings = $node->siblings();
				foreach ($siblings as $key => $sibling) {
					if ($sibling == $node) {
						echo '<li>' . $sibling->name . '</li>';
						continue;
					}
					echo '<li><a href="/' . $sibling->getLink() . '">' . $sibling->name . '</a></li>';
				}
			?>
		</ul>
	</div><!-- / box body -->
	</div>

	<div class="box latestnews">
		<div class="box_header">
			<h3><a href="{{route('news.index')}}">Latest News &amp; Events</a></h3>
		</div>
		<div class="box_body">
			<ul>
				<?php
					$news = News::orderBy('public_date','desc')->take(3)->get();
				?>
				@foreach ($news as $key => $news_item)
					<li>
						@if($news_item->image())
							<a href="/news/{{$news_item->slug}}"><img src="{{$news_item->image()}}" alt="{{$news_item->title}}"></a><br>
						@endif

						<a href="/news/{{$news_item->slug}}">{{$news_item->title}}</a>
					</li>
				@endforeach
			</ul>
		</div>

	</div>

<!-- Latest Blog Posts -->

<?php
	$sp = new SimplePie();
	$sp->set_feed_url('https://arisprimaryict.wordpress.com/feed');
	$sp->set_cache_duration(1800);
	$sp->set_cache_location(storage_path().'/spcache');
	$sp->init();
	$latestPosts = $sp->get_items(0,3);
?>

	<div class="box latestnews">
		<div class="box_header">
			<h3>Latest Blog Posts</h3>
		</div>
		<div class="box_body">
			<ul>
				@foreach ($latestPosts as $post)
					<li><a href="{{$post->get_link()}}">{{$post->get_title()}}</a></li>
				@endforeach		
			</ul>			
		</div>
	</div>


</aside>