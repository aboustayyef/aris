@extends('layouts.main')


@section('title')

	{{-- Code for Getting title --}}
	
	@if ($type == 'all')
		<title>ARIS | People </title>
	@else
		<title>ARIS | People | {{$type}}</title>
	@endif

@stop



@section('content')

<div class="inner">


	<div id="content-area">

		@if(Auth::Check())
			<div id="adminCreate">
				<a href="{{route('people.create')}}/?from={{Request::path()}}">Add New Person</a>
			</div>
		@endif

		<div class="breadcrumbs">You are here: <a href="/">Home</a> > People</div>
		
		@if ($type == 'all')
			<h1>Aris People</h1>
			<p>Create here a manual index for 3 types of people</p>
		@else 
			<h1>Aris {{$type}}</h1>
			{{View::make('people.partials.peopleList')->with('people', $people)}}
		@endif 

	</div>

	@include('partials.newssidebar')

</div>

@stop