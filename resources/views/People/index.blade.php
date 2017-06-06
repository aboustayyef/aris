@extends('layouts.main')


@section('title')

	{{-- Code for Getting title --}}
	
	<title>{{$title}}</title>

	<meta name="description" content="Meet the people who make ARIS what it is">

@stop

@section('facebookMeta')

	<!-- Facebook Open Graph Data -->
	@if ($category == 'index')
		<meta property="og:title" content="ARIS | People">
	@else
		<meta property="og:title" content="ARIS | People | {{$category}}">
	@endif
    <meta property="og:description" content="Meet the people who make ARIS what it is">

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
			@if ($category == 'index')
				People 
			@else
				<a href="/people">People</a> >{{$category}}</a>
			@endif

		</div>
		
		@if ($category == 'index')
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
			<h1>Aris {{$category}}</h1>
			@include('People.partials.peopleList',['people' => $people]);
		@endif 

	</div>

	@include('partials.newssidebar')

</div>

@stop