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
   <ul class="slides">
   		{{-- special pinned slide --}}
   		<li><img src="{{asset('img/slides/aris_graduating_class_2019.jpg')}}" alt=""></li>
   		<li><img src="{{asset('img/slides/aris_is_an_IBCP_candidate_school.jpg')}}" alt=""></li>
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

				@include('partials.latestNews')
				@include('partials.latestVideos')

				
			</div> <!-- grid1-2 -->
			
			<div class="grid2-2">
				
				@include('partials.quickAccess')
				@include('partials.arisCredentials')
				{{-- @include('partials.arisRecruiting') --}}
				@include('partials.videoTestimonials')
				@include('partials.ucas')


			</div> <!-- grid2-2 -->
		</div>
		<div>
			<div class="grid1-2">
			</div>	
			<div class="grid2-2">
				{{-- Empty --}}
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
