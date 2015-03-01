<?php 
use Carbon\Carbon;
$date = new Carbon($news->public_date);
?>
@extends('layouts.admin')

@section('title')
	<title>Edit Story</title>
@stop

@section('content')

{{ Form::open(array('route' => array('news.update', $news->id), 'method' => 'put')); }}

	<div class="form-group">
		{{ Form::label('title', 'Title')}}
		{{ Form::text('title', $news->title, ['placeholder' => 'News Title', 'class'=>'form-control']) }}
	</div>

	<div class="form-group">
		<label for="date" class="control-label">Date (yyyy-mm-dd) </label>
		<input class="form-control" name="date" type="text" id="date" value = "{{$date->format('Y-m-d')}}">
	</div>

	<div class="form-group">
		{{ Form::label('content', 'Content')}}
		{{ Form::text('content', $news->content,['id'=>'content']) }}
	</div>
<input type="hidden" name="from" value ="{{Input::get('from')}}">

<button type="submit" class="btn btn-default">Submit</button>
<?php
// Trigger TinyMCE for editing
Aris\Helpers::activateAdvancedEditor('#content');
?>

{{ Form::close()}}

<!-- Destroy button -->

{{ Form::open(array('route' => array('news.destroy', $news->id), 'method' => 'delete')) }}
        <button type="submit" class="btn btn-danger btn-mini">Delete</button>
{{ Form::close() }}

@stop