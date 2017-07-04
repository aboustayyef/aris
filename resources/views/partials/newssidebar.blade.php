<?php 
	use Aris\News;
	$latestNews = News::orderBy('public_date','desc')->take(15)->pluck('title','slug');
	$latestNews = Cache::Remember('latest_news_10', 5 * 60, function(){
		return News::orderBy('public_date','desc')->take(15)->pluck('title','slug');
	});

?>
<aside id="content-sidebar">
	<!-- Navigation of sibling sections -->
	<div class="box siblings">
		@include('partials.quickAccess')
	</div>
	<div class="box siblings">
		<div class="box_header"><h3>Latest Stories</h3></div>
		<div class="box_body">
			<ul>
				@foreach($latestNews as $key=>$value)
					<li><a href="/news/{{$key}}">{{$value}}</a></li>
				@endforeach
			</ul>
		</div>
	</div><!-- / box body -->
</aside>