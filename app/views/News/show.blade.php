@extends('layouts.main')

@section('content')
<div class="inner">

	<div id="content-area">
		<h2>{{$newsItem->title}}</h2>
		{{$newsItem->content}}
        
        @if(Auth::Check())
                @include('partials.newsmetadata')
        @endif
	</div>
	
	@include('partials.newssidebar')

</div>

@stop