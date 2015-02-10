<?php 
	use Aris\News;
	$latestNews = News::orderBy('public_date','desc')->take(15)->lists('title','slug');

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
		<p>News Stuff</p>
	</div><!-- / box body -->
</aside>