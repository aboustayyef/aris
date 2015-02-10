<?php 
$now = new Carbon\Carbon;
?>

@extends('layouts.admin')

@section('content')

{{ Form::open(array('route' => 'news.store')); }}

{{ FormField::title() }}
<div class="form-group">
	<label for="date" class="control-label">Date (yyyy-mm-dd) </label>
	<input class="form-control" name="date" type="text" id="date" value = "{{$now->format('Y-m-d')}}">
</div>

{{ FormField::content(['type' => 'textarea']) }}
<button type="submit" class="btn btn-default">Submit</button>

<?php
// Trigger TinyMCE for editing
Aris\Helpers::activateAdvancedEditor('#content');
?>
{{ Form::close()}}

@stop