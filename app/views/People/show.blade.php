@extends('layouts.main')

@section('title')
	<title>{{$person->title}} {{$person->firstname}} {{$person->lastname}} | ARIS People</title>
@stop

@section('content')
<div class="inner">

	<div id="content-area">

		<div class="breadcrumbs">You are here: <a href="/">Home</a> > <a href="/people">People</a> > {{$person->title}} {{$person->firstname}} {{$person->lastname}}</div>

		<h2>{{$person->title}} {{$person->firstname}} {{$person->lastname}}</h2>
		<h3>{{$person->designation}}</h3>
		
		<p>
			{{$person->bio}}
		</p>
		
        
        @if(Auth::Check())
             {{-- Add edit button --}}
        @endif
	</div>
	
	@include('partials.newssidebar')

</div>

@stop