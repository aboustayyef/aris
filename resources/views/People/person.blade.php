@extends('layouts.main')

@section('title')
	<title>$title</title>
@stop

@section('facebookMeta')
	<!-- Facebook Open Graph Data -->
    <meta property="og:title" content="{{$person->title}} {{$person->firstname}} {{$person->lastname}} | ARIS People">
    <meta property="og:description" content="{{$person->designation}}, {{$person->department}}">
    @if($person->image())
	    <meta property="og:image" content="http://aris.edu.gh{{$person->image()}}">
	@endif
@stop

@section('content')
<div class="inner">

	<div id="content-area">

		<div class="breadcrumbs">You are here: <a href="/">Home</a> > <a href="/people">People</a> > {{$person->title}} {{$person->firstname}} {{$person->lastname}}</div>

		<h2>{{$person->title}} {{$person->firstname}} {{$person->lastname}} </h2>
		<h3>{{$person->designation}} <small>({{$person->department}})</small></h3>
		
		<p>
			{!!$person->bio!!}
		</p>
		
        
        @if(Auth::Check())
				<a class="admin" href="{{route('people.edit',$person->id)}}?from={{Request::path()}}">Edit Details</a>
		@endif
	</div>
	
	@include('partials.newssidebar')

</div>

@stop