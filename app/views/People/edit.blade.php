@extends('layouts.admin')

@section('content')

{{ Form::open(array('route' => array('people.update', $person->id), 'method' => 'put')); }}

<div class="form-group">
	<label for="title" class="control-label">Title: (Mr. , Ms. , Dr. , Prof.)</label>
	<input class="form-control" name="title" type="text" id="title" value="{{$person->title}}">
</div>
<div class="form-group">
	<label for="firstname" class="control-label">Firstname: </label>
	<input class="form-control" name="firstname" type="text" id="firstname" value="{{$person->firstname}}">
</div>
<div class="form-group">
	<label for="lastname" class="control-label">Lastname: </label>
	<input class="form-control" name="lastname" type="text" id="lastname" value="{{$person->lastname}}">
</div>

<div class="form-group">
	<label for="type" class="control-label">Position (You can pick more than one)</label>
	<div><input type="checkbox" name="type[]" value="admin" 
		@if(strstr($person->type , 'admin'))
			checked="checked"
		@endif
	> Admin</div>
	<div><input type="checkbox" name="type[]" value="teacher"
		@if(strstr($person->type , 'teacher'))
			checked="checked"
		@endif
	> Teacher</div>
	<div><input type="checkbox" name="type[]" value="staff"
		@if(strstr($person->type , 'staff'))
			checked="checked"
		@endif
	 > Staff</div>
</div>

<div class="form-group">
	<label for="designation" class="control-label">Designation: </label>
	<input class="form-control" name="designation" type="text" id="designation" value="{{$person->designation}}">
</div>

<div class="form-group">
	<label for="bio" class="control-label">Bio: </label>
	<textarea class="form-control" type="textarea" name="bio" cols="50" rows="10" id="bio">{{$person->bio}}</textarea>
</div>

<button type="submit" class="btn btn-default">Submit</button>

<?php
// Trigger TinyMCE for editing
Aris\Helpers::activateAdvancedEditor('#bio');
?>
{{ Form::close()}}

<!-- Destroy button -->

{{ Form::open(array('route' => array('people.destroy', $person->id), 'method' => 'delete')) }}
        <button type="submit" class="btn btn-danger btn-mini">Delete Person</button>
{{ Form::close() }}

@stop