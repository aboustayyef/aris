@extends('layouts.main')

@section('content')
<div class="inner">

	<div id="content-area">

		<div class="breadcrumbs">You are here: <a href="/">Home</a> > <a href="/news">News</a> > Story</div>

		<h2>{{$newsItem->title}}</h2>
		{{$newsItem->content}}
        
        @if(Auth::Check())
                @include('partials.newsmetadata')
        @endif
	</div>
	
	@include('partials.newssidebar')

</div>

@stop