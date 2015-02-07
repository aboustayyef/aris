@extends('layouts.admin')

@section('content')

	<h2>Edit Page</h2>
	<hr>
	@include('partials.formerrors')

	{{ Form::open(array('route' => array('pages.update', $page->id), 'method' => 'put')); }}

	<div class="form-group">
		{{ Form::label('title', 'Title')}}
		{{ Form::text('title', $page->name, ['placeholder' => 'Page Title', 'class'=>'form-control']) }}
	</div>

	<div class="form-group">
		{{ Form::label('content', 'Content')}}
		{{ Form::text('content', $page->content,['id'=>'content', 'placeholder'=>'Insert image by clicking on the icon above']) }}
	</div>
	
	<input type="hidden" name="from" value="{{Input::get('from')}}">

	<button type="submit" class="btn btn-default">Submit</button>

	{{ Form::close() }}

	<!-- Ignite TinyMce -->
	<?php
	Aris\Helpers::activateAdvancedEditor('#content');
	?>

@stop