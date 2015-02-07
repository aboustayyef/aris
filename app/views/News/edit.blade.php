@extends('layouts.admin')

@section('content')

{{ Form::open(array('route' => array('news.update', $news->id), 'method' => 'put')); }}

	<div class="form-group">
		{{ Form::label('title', 'Title')}}
		{{ Form::text('title', $news->title, ['placeholder' => 'News Title', 'class'=>'form-control']) }}
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

@stop