@extends('layouts.main')

@section('title')
	<meta name="Description" content="As a forward thinking school, our mission focuses on the provision of the highest level of International standards in education adopting the Cambridge International and British National Curricula.">
	<title>Al-Rayan International School - Ghana</title>
@stop

@section('facebookMeta')
	<!-- Facebook Open Graph Data -->
    <meta property="og:title" content="Al-Rayan International School, Ghana">
    <meta property="og:description" content="As a forward thinking school, our mission focuses on the provision of the highest level of International standards in education adopting the Cambridge International and British National Curricula.">
    <meta property="og:image" content="https://aris.edu.gh/img/slides/slide1.jpg">
@stop

@section('content')

<!-- Slide Show -->
<div class="flexslider">
	<div class="slogan_background">
		<div class="inner">
			<div class="slogan">Inspire, Empower, Transform</div>	
		</div>
	</div>
   <ul class="slides">
   		{{-- special pinned slide --}}
   		<li><img src="{{asset('img/slides/aris_fifteen_years.gif?v=2')}}" alt=""></li>
   		<li><img src="{{asset('img/slides/aris_graduating_class_2018.jpg?v=2')}}" alt=""></li>
	   	@foreach ($slides as $key => $slide)
			<li><img src="{{asset('img/slides/' . $slide . '?v=2')}}" alt=""></li>
	   	@endforeach
  </ul>
</div>

<div class="section">
	<div class="inner">
		<div>
			<div class="grid1-2">
				<div class="intro">
					<h2 class="slogan">Welcome to ARIS</h2>
					<p>Recognized as a young and forward-thinking school, ARIS is an outstanding place for students and teachers alike. <a href="{{url('/about-us/why-aris')}}" class="learnmore">Learn More&nbsp;&rarr;</a></p>
				</div>
				<div>
					{{-- <div style="width:30%; display:inline-block;">
						<div class="videoWrapper">
		                    <iframe src="https://player.vimeo.com/video/221415953" width="640" height="360" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
						</div>
					</div> --}}
					<div style="width:48%; display:inline-block;">
						<div style="padding:56.25% 0 0 0;position:relative;"><iframe src="https://player.vimeo.com/video/286186538?byline=0&portrait=0" style="position:absolute;top:0;left:0;width:100%;height:100%;" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe></div><script src="https://player.vimeo.com/api/player.js"></script>
<p><a href="https://vimeo.com/286186538">Students in Ghana talk about the PYP (Part 1)</a></p>
					</div>
					<div style="width:48%; display:inline-block;"><div style="padding:56.25% 0 0 0;position:relative;"><iframe src="https://player.vimeo.com/video/286188364?byline=0&portrait=0" style="position:absolute;top:0;left:0;width:100%;height:100%;" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe></div><script src="https://player.vimeo.com/api/player.js"></script>
<p><a href="https://vimeo.com/286188364">Students in Ghana talk about the PYP (Part 2)</a> </p>
					</div>
					{{-- @include('partials.homePagePhotoRotate') --}}
				</div>
				<div class="aris_credentials">
				<h3>ARIS is an <a href="http://www.ibo.org/">IB World School</a></h3>

				<a href ="http://www.ibo.org/programmes/primary-years-programme/">
					<img src="{{asset('img/ib-pyp-colour-en.png')}}" width="160px" height="auto" alt="PYP">
				</a>

				<a href="http://www.ibo.org/en/programmes/diploma-programme/">
					<img src="{{asset('img/dp-programme-logo-en.png')}}" width="160px" height="auto" alt="">
				</a>
				<p>ARIS is Candidate school for the IB-MYP</p>
				<h3>And a member of:</h3>
					<a href="http://www.theptc.org/"><img src="/img/ptc.jpg" width="80px" alt="PTC Logo"></a>
					&nbsp;
					<a href="https://www.aisa.or.ke/"><img src="/img/aisa_logo.png" width="55px" height="55px" alt=""></a>
				</div>

			</div> <!-- grid1-2 -->

			<div class="grid2-2">

				@include('partials.quickAccess')

				@include('partials.specialBanner')

				<h2 class="latestNews">
					Latest News &amp; Events
					<small><a href="/news">Read All</a></small>
				</h2>

				@foreach ($news as $key => $news_item) 
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
							<p>{{$news_item->excerpt}}</p>
						</div>
					</div> <!-- news_item_wrapper -->
				@endforeach

			</div> <!-- grid2-2 -->
		</div>
		<div>
			<div class="grid1-2">
				<h2 class="latestNews">Latest Blog Posts</h2>
				@foreach($blog_posts as $blog_post)
					<div class="news_item_wrapper">
							<div class="news_item_photo">
								<img src="{{$blog_post['thumb']}}" width="45" height="auto" alt="">
							</div>
							<a href="{{$blog_post['link']}}">
								<h3>{{$blog_post['title']}}</h3>
							</a>
							<div class="news_excerpt">
								<p>{{$blog_post['blog title']}}</p>
							</div>
					</div>	
				@endforeach
			</div>
			<div class="grid2-2">
				<h2 class="latestNews">Latest Videos</h2>
				<div class="videoWrapper">
					<iframe src="https://www.youtube.com/embed/+lastest?list=UUWiDGaT2tIlkfo5tNzVS-_Q" frameborder="0" allowfullscreen></iframe><br/>
				</div>
			</div>
		</div>
	</div> <!-- inner -->
</div> <!-- section -->
<div class="section">
	<div class="inner" style="margin-bottom:3.5em">
		<hr style="margin-bottom:1.5em;border:1px solid #ededed">
		<div class="grid2-2">
			<a href="http://www.cambridgeinternational.org/"><img src= {{asset('/img/cambridge.png')}} width="50%" height="50%"></a>
		</div>
		<div class="grid1-2">
				<p>ARIS is a registered Associate of Cambridge Assessment International Education</p>
		</div>
	</div>
</div>
@stop
