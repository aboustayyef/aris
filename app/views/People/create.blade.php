<?php 
$now = new Carbon\Carbon;
?>

@extends('layouts.admin')

@section('content')

{{ Form::open(array('route' => 'people.store')); }}

<div class="form-group">
	<label for="title" class="control-label">Title: (Mr. , Ms. , Dr. , Prof.)</label>
	<input class="form-control" name="title" type="text" id="title">
</div>
<div class="form-group">
	<label for="firstname" class="control-label">Firstname: </label>
	<input class="form-control" name="firstname" type="text" id="firstname">
</div>
<div class="form-group">
	<label for="lastname" class="control-label">Lastname: </label>
	<input class="form-control" name="lastname" type="text" id="lastname">
</div>

<div class="form-group">
	<label for="type" class="control-label">Position (You can pick more than one)</label>
	<div><input type="checkbox" name="type[]" value="Administration"> Administration</div>
	<div><input type="checkbox" name="type[]" value="Faculty"> Faculty</div>
	<div><input type="checkbox" name="type[]" value="Staff"> Staff</div>
</div>

<div class="form-group">
	<label for="designation" class="control-label">Designation: (Description of what they do) </label>
	<input class="form-control" name="designation" type="text" id="designation">
</div>

<div class="form-group">
	<label for="department" class="control-label">Department: (Example: Foundation, Primary.. etc) </label>
	<input class="form-control" name="department" type="text" id="department">
</div>

<div class="form-group">
	<label for="bio" class="control-label">Bio: </label>
	<textarea class="form-control" type="textarea" name="bio" cols="50" rows="10" id="bio"></textarea>
</div>

@if(Input::has('from'))
<input type="hidden" name="from" value="{{Input::get('from')}}">
@endif

<button type="submit" class="btn btn-default">Submit</button>

<?php
// Trigger TinyMCE for editing
Aris\Helpers::activateAdvancedEditor('#bio');
?>
{{ Form::close()}}

@stop