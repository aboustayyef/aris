@extends('layouts.main')


@section('title')

	{{-- Code for Getting title --}}
	@if (isset($input['type']) && in_array($input['type'], ['teacher','admin','staff']))
		<?php $type = $input['type']; ?>
		<title>ARIS | People | {{$input['type']}}</title>
	@else
		<?php $type = null ; ?>
		<title>ARIS | People</title>
	@endif

@stop



@section('content')

<div class="inner">


	<div id="content-area">

		<div class="breadcrumbs">You are here: <a href="/">Home</a> > People</div>
		
		@if ($type)
			@if ($type == 'admin')
				<h1>Aris Administrative Staff</h1>
			@elseif ($type == 'teacher')
				<h1>Aris Teachers</h1>
			@elseif ($type == 'staff' )
				<h1>Aris Staff</h1>
			@endif
		@else
			<h1>Aris People</h1>
		@endif

		@if(Auth::Check())
			<div id="adminCreate">
				<a href="{{route('people.create')}}">Add New Person</a>
			</div>
		@endif


		@if ($people->count() == 0)
			<p>Sorry. Database is still new. No people to enter yet</p>
		@else
			<ul>
				@foreach ($people as $key => $person) 
					<li><a href="/people/{{$person->id}}">{{$person->lastname}}, {{$person->firstname}}</a> {{$person->designation	}}</li>
				@endforeach
			</ul>
		@endif

	</div>

	@include('partials.newssidebar')

</div>

@stop