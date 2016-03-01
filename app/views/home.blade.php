<?php 

use Aris\News;
?>
@extends('layouts.main')

@section('title')
	<meta name="Description" content="As a forward thinking school, our mission focuses on the provision of the highest level of International standards in education adopting the Cambridge International and British National Curricula.">
	<title>Al-Rayan International School - Ghana</title>
@stop

@section('facebookMeta')
	<!-- Facebook Open Graph Data -->
    <meta property="og:title" content="Al-Rayan International School, Ghana">
    <meta property="og:description" content="As a forward thinking school, our mission focuses on the provision of the highest level of International standards in education adopting the Cambridge International and British National Curricula.">
    <meta property="og:image" content="http://aris.edu.gh/img/slides/slide1.jpg">
@stop

@section('content')
@include('partials.slideshow')

<div class="section">
	<div class="inner">
		<div class="grid1-2">
			<div class="intro">
				<h2 class="slogan">Welcome to ARIS</h2>
				<p>Recognized as a young and forward-thinking school, ARIS is an outstanding place for students and teachers alike. <a href="{{url('/about-us/why-aris')}}" class="learnmore">Learn More&nbsp;&rarr;</a></p>
			</div>
			<div>
				@include('partials.homePagePhotoRotate')
			</div>
			<h3>ARIS is an <a href="http://www.ibo.org/">IB World School</a></h3>
			<a href="http://www.ibo.org/en/programmes/diploma-programme/">
				<img src="{{asset('img/dp-programme-logo-en.png')}}" width="200px" height="auto" alt="">
			</a>
			
		</div> <!-- grid1-2 -->

		<div class="grid2-2">

			@include('partials.quickAccess')

			@include('partials.specialBanner')

			<h2 class="latestNews">
				Latest News &amp; Events
				<small><a href="/news">Read All</a></small>
			</h2>


				<?php

					$news = News::orderBy('public_date','desc')->take(3)->get();
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
									<p>{{$news_item->excerpt()}}</p>
								</div>
								
							</div>
						<?php
					}
				?>
				@include('partials/latestBlogPosts')
		</div> <!-- grid2-2 -->
	</div> <!-- inner -->
</div> <!-- section -->

{{--  
<div class="section green">
	<div class="inner">
			<blockquote>
				“Inclusive, good-quality education is a foundation for dynamic and equitable societies.” -- Desmond Tutu
			</blockquote>		
	</div>
</div>

<div class="section darken">
	<div class="inner">
		<div class="grid1-3">
			<h3>Information for Parents</h3>
			Lorem ipsum dolor sit amet, consectetur adipisicing elit. Repellat voluptatum mollitia nesciunt maxime harum fugit itaque labore incidunt amet necessitatibus.
		</div>
		<div class="grid2-3">
			<h3>Our Campuses</h3>
			<h4>Primary</h4>
			<img src="/img/uploads/pages/primary-campus.jpg" alt="">
			<h4>Secondary</h4>
			<img src="/img/uploads/pages/secondary-campus.jpg" alt="">
		</div>
		<div class="grid3-3">
			<h3>Academic Calendar</h3>
			<a href="/calendar"><img src="/img/aris_calendar_combined_14-15.png" alt=""></a>
		</div>
	</div>
</div>
--}}
<div class="section">
	<div class="innner">
		
	</div>
</div>

@stop