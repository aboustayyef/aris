@extends('layouts.admin')

@section('content')

			<h2>Create News Item</h2>
			<hr>
			@include('partials.formerrors')

			{{ Form::open(array('route' => 'news.store')) }}

			<div class="form-group">
			    {{ Form::label('title', 'Title')}}
				{{ Form::text('title', null ,['placeholder' => 'Title of News Item', 'class'=>'form-control']) }}
			</div>
			
			<div class="form-group">
			    {{ Form::label('description', 'Event Description')}}
				{{ Form::text('description', null ,['id' => 'description', 'class'=>'form-control']) }}
			</div>

			<button type="submit" class="btn btn-default">Submit</button>

			{{ Form::close() }}

			<!-- Ignite TinyMce -->
			<?php 
			Aris\Helpers::activateAdvancedEditor('#description');
			?>

@stop