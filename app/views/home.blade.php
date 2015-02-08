<?php 

use Aris\News;

?>
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
				<img src="{{asset('img/featured/welcome.jpg')}}" alt="">
			</div>
		</div> <!-- leftColumn -->

		<div class="rightColumn">

			@include('partials.quickAccess')

			<h2 class="latestNews">
				Latest News &amp; Events
				<small><a href="/news">Read All</a></small>
			</h2>
				<?php

					$news = News::orderBy('created_at','desc')->take(3)->get();
					foreach ($news as $key => $news_item) {
						?>
							<div class="news_item_wrapper">
								
								@if (($news_item->image()))
									<div class="news_item_photo">
										<a href="/news/{{$news_item->slug}}">
											<img src="{{$news_item->image()}}" alt="">
										</a>
									</div>
								@endif

								<a href="/news/{{$news_item->slug}}">
									<h3>{{$news_item->title}}</h3>
								</a>
								
								<div class="news_excerpt">
									<p>{{$news_item->excerpt()}} - <a href="/news/{{$news_item->slug}}">read more&nbsp;&rarr;</a></p>
								</div>
							</div>
						<?php
					}
				?>
		</div> <!-- rightColumn -->
	</div> <!-- inner -->
</div> <!-- section -->

@stop