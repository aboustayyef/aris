<?php 
$now = new Carbon\Carbon;
?>

@extends('layouts.admin')

@section('content')

<form method="POST" action="/news" accept-charset="UTF-8">

	<input type="hidden" name="_token" value="{{csrf_token()}}">

	<div class="form-group">
		<label for="title" class="control-label">Title: </label>
		<input class="form-control" name="title" type="text" id="title">
	</div>

	<div class="form-group">
		<label for="date" class="control-label">Date (yyyy-mm-dd) </label>
		<input class="form-control" name="date" type="text" id="date" value = "{{$now->format('Y-m-d')}}">
	</div>

	<div class="form-group">
		<label for="content" class="control-label">Content: </label>
		<textarea class="form-control" type="textarea" name="content" cols="50" rows="10" id="content"></textarea>
	</div>


<button type="submit" class="btn btn-default">Submit</button>

@include('partials.scratchpad')

<?php
// Trigger TinyMCE for editing
Aris\Helpers::activateAdvancedEditor('#content');
?>
</form>

@stop