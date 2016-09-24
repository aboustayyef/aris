@extends('layouts.admin')

@section('title')
	<title>Edit Person</title>
@stop

@section('content')

<form method="POST" action="/people/{{$person->id}}" accept-charset="UTF-8"><input name="_method" type="hidden" value="PUT"><input name="_token" type="hidden" value="{{csrf_token()}}">

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
	<div><input type="checkbox" name="type[]" value="Administration" 
		@if(strstr($person->type , 'Administration'))
			checked="checked"
		@endif
	> Administration</div>
	<div><input type="checkbox" name="type[]" value="Faculty"
		@if(strstr($person->type , 'Faculty'))
			checked="checked"
		@endif
	> Faculty</div>
	<div><input type="checkbox" name="type[]" value="Staff"
		@if(strstr($person->type , 'Staff'))
			checked="checked"
		@endif
	 > Staff</div>
</div>

<div class="form-group">
	<label for="designation" class="control-label">Designation: (Description of what they do) </label>
	<input class="form-control" name="designation" type="text" id="designation" value="{{$person->designation}}">
</div>

<div class="form-group">
	<label for="department" class="control-label">Department: (Example: Foundation, Primary.. etc) </label>
	<input class="form-control" name="department" type="text" id="department" value="{{$person->department}}">
</div>

<div class="form-group">
	<label for="bio" class="control-label">Bio: </label>
	<textarea class="form-control" type="textarea" name="bio" cols="50" rows="10" id="bio">{{$person->bio}}</textarea>
</div>

@if(Input::has('from'))
<input type="hidden" name="from" value="{{Input::get('from')}}">
@endif

<button type="submit" class="btn btn-default">Submit</button>

@include('partials.scratchpad')

<?php
// Trigger TinyMCE for editing
Aris\Helpers::activateAdvancedEditor('#bio');
?>
</form>

<!-- Destroy button -->

<form method="POST" action="/people/{{$person->id}}" accept-charset="UTF-8"><input name="_method" type="hidden" value="DELETE"><input name="_token" type="hidden" value="{{csrf_token()}}">
        <button type="submit" class="btn btn-danger btn-mini">Delete Person</button>
</form>
@stop