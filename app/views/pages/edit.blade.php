@extends('layouts.admin')


@section('title')
	<title>Edit Page</title>
@stop

@section('content')

	<h2>Edit Page</h2>
	<hr>
	@include('partials.formerrors')

<form method="POST" action="/pages/{{$page->id}}" accept-charset="UTF-8">

	<input name="_method" type="hidden" value="PUT">
	<input type="hidden" name="_token" value="{{csrf_token()}}">

	<div class="form-group">
		<label for="title">Title</label>
		<input placeholder="Page Title" class="form-control" name="title" type="text" value="{{$page->name}}" id="title">
	</div>


	<div class="form-group">
		<label for="content">Content</label>
		<input id="content" placeholder="Insert image by clicking on the icon above" name="content" type="text" value="{{htmlentities($page->content)}}">
	</div>
	
	<input type="hidden" name="from" value="{{Input::get('from')}}">

	<button type="submit" class="btn btn-default">Submit</button>

	@include('partials.scratchpad')

</form>

	<!-- Ignite TinyMce -->
	<?php
	Aris\Helpers::activateAdvancedEditor('#content');
	?>

@stop