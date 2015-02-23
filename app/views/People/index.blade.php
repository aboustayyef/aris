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
			<br>
			<div id="adminCreate">
				<a href="{{route('people.create')}}/?from={{Request::path()}}">Add New Person</a>
			</div>
		@endif

		<div class="breadcrumbs">
			You are here: <a href="/">Home</a> > 
			@if ($type == 'all')
				People 
			@else
				<a href="/people">People</a> >{{$type}}</a>
			@endif

		</div>
		
		@if ($type == 'all')
			<h1>Aris People</h1>
			<a href="/people/admin">
				<h2>Administration</h2>
			</a>
				<p>School leadership and Administration</p>
			<a href="/people/faculty">
				<h2>Faculty</h2>
			</a>
				<p>Teachers and teaching assistants</p>

			<a href="/people/staff">
				<h2>Staff</h2>
			</a>
				<p>Non-teaching school staff</p>

		@else 
			<h1>Aris {{$type}}</h1>
			{{View::make('People.partials.peopleList')->with('people', $people)}}
		@endif 

	</div>

	@include('partials.newssidebar')

</div>

@stop