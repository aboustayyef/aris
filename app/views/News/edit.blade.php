<?php 
use Carbon\Carbon;
$date = new Carbon($news->public_date);
?>
@extends('layouts.admin')

@section('title')
	<title>Edit Story</title>
@stop

@section('content')

<form method="POST" action="/news/{{$news->id}}" accept-charset="UTF-8">
	<input name="_method" type="hidden" value="PUT">
	<input type="hidden" name="_token" value="{{csrf_token()}}">

	<div class="form-group">
		<label for="title">Title</label>
		<input placeholder="News Title" class="form-control" name="title" type="text" value="{{htmlentities($news->title)}}" id="title">
	</div>

	<div class="form-group">
		<label for="date" class="control-label">Date (yyyy-mm-dd) </label>
		<input class="form-control" name="date" type="text" id="date" value = "{{$date->format('Y-m-d')}}">
	</div>

	<div class="form-group">
		<label for="content">Content</label>
		<input id="content" name="content" type="text" value="{{ htmlentities($news->content) }}">
	</div>

<input type="hidden" name="from" value ="{{Input::get('from')}}">

<button type="submit" class="btn btn-default">Submit</button>

@include('partials.scratchpad')

<?php
// Trigger TinyMCE for editing
Aris\Helpers::activateAdvancedEditor('#content');
?>
</form>

<!-- Destroy button -->
<form method="POST" action="/news/{{$news->id}}" accept-charset="UTF-8">
	<input name="_method" type="hidden" value="DELETE">
	<input type="hidden" name="_token" value="{{csrf_token()}}">
    <button type="submit" class="btn btn-danger btn-mini">Delete</button>
</form>

@stop