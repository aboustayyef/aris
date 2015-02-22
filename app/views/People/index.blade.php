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

		@if(Auth::Check())
			<div id="adminCreate">
				<a href="{{route('people.create')}}/?from={{Request::path()}}">Add New Person</a>
			</div>
		@endif

		<div class="breadcrumbs">You are here: <a href="/">Home</a> > People</div>
		
		@if ($type)
			@if ($type == 'admin')

				<h1>Aris Administrative Staff</h1>
				{{View::make('people.partials.peopleList')->with('people', $admins)}}
				
			@elseif ($type == 'teacher')

				<h1>Aris Teachers</h1>
				{{View::make('people.partials.peopleList')->with('people', $teachers)}}

			@elseif ($type == 'staff' )

				<h1>Aris Staff</h1>
				{{View::make('people.partials.peopleList')->with('people', $staff)}}

			@endif

		@else
			<h1>Aris People</h1>

			<p>Introduction paragraph Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reiciendis cum eaque expedita cumque fuga vitae consectetur laudantium itaque minus quo accusamus possimus doloribus, quae soluta, culpa quam at hic provident.</p>

			<h2>Aris Administrative Staff</h2>
			{{View::make('people.partials.peopleList')->with('people', $admins)}}

			<h2>Aris Teachers</h2>
			{{View::make('people.partials.peopleList')->with('people', $teachers)}}

			<h2>Aris Staff</h2>
			{{View::make('people.partials.peopleList')->with('people', $staff)}}

		@endif

	</div>

	@include('partials.newssidebar')

</div>

@stop