@extends('layouts.main')

@section('content')

@include('partials.slideshow')

<div class="section">
	<div class="inner">
		<div class="leftColumn">
			<div class="intro">
				<h2 class="slogan">Welcome to Aris</h2>
				<p>Recognized as a young and forward thinking school ARIS is an outstanding place to work and go to school. <a href="" class="learnmore">Learn More&nbsp;&rarr;</a></p>
			</div>
			<div>
				<img src="http://placehold.it/500x300" alt="">
			</div>
		</div> <!-- leftColumn -->

		<div class="rightColumn">

			@include('partials.quickAccess')

			<h2 class="latestNews">
				Latest News &amp; Events
			</h2>
				<?php
					if (!Cache::has('latestNews')) {
						Cache::put('latestNews', (new Aris\NewsArticles())->get(3) , 60); //60 minutes
					}
					$news = Cache::get('latestNews');
					foreach ($news as $key => $news_item) {
						?>
							<div class="news_item_wrapper">
								<a href="{{$news_item->link()}}">
									<h3>{{$news_item->title()}}</h3>
								</a>
								@if (($news_item->image()))
									<div class="news_item_photo">
										<img src="{{$news_item->image()}}" alt="">
									</div>
								@endif
								<div class="news_excerpt">
									<p>{{$news_item->excerpt()}} - <a href="{{$news_item->link()}}">read more&nbsp;&rarr;</a></p>
								</div>
							</div>
						<?php
					}
				?>
		</div> <!-- rightColumn -->
	</div> <!-- inner -->
</div> <!-- section -->

<div class="section">
	<div class="inner">
		<div class="leftColumn">
			<h3>Something goes here</h3>
			<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolores sunt ut distinctio reiciendis, tenetur reprehenderit corporis laboriosam similique officia porro.</p>
		</div>
		<div class="rightColumn">
			<br>
			<img src="http://placehold.it/500x300">
		</div>
	</div>
</div> <!-- Section darken -->

@stop