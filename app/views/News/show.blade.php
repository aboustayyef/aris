@extends('layouts.main')

@section('title')
	<title>ARIS News: {{$newsItem->title}}</title>
@stop

@section('facebookMeta')
	<!-- Facebook Open Graph Data -->
    <meta property="og:title" content="ARIS News: {{$newsItem->title}}">
    @if($newsItem->image())
		<meta property="og:image" content="http://aris.edu.gh{{$newsItem->image()}}">
    @endif
    
@stop

@section('content')
<div class="inner">

	<div id="content-area">

		<div class="breadcrumbs">You are here: <a href="/">Home</a> > <a href="/news">News</a> > Story</div>

		<h2>{{$newsItem->title}}</h2>

		<?php 
			$publicDate = new \Carbon\Carbon($newsItem->public_date);
			$publicDate = $publicDate->toFormattedDateString();
		?>
		<div class="timestamp">{{$publicDate}}</div>

		{{$newsItem->content}}
        
        @if(Auth::Check())
                @include('partials.newsmetadata')
        @endif
	</div>
	
	@include('partials.newssidebar')

</div>

@stop