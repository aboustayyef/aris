<?php 
$now = new Carbon\Carbon;
?>

@extends('layouts.admin')

@section('content')

{{ Form::open(array('route' => 'people.store')); }}

{{ FormField::title() }}
{{ FormField::firstname() }}
{{ FormField::lastname() }}

<div class="form-group">
	<label for="type" class="control-label">Position (You can pick more than one)</label>
	<div><input type="checkbox" name="type[]" value="admin"> Admin</div>
	<div><input type="checkbox" name="type[]" value="teacher"> Teacher</div>
	<div><input type="checkbox" name="type[]" value="staff"> Staff</div>
</div>

{{ FormField::designation() }}


{{ FormField::bio(['type' => 'textarea']) }}

<button type="submit" class="btn btn-default">Submit</button>

<?php
// Trigger TinyMCE for editing
Aris\Helpers::activateAdvancedEditor('#bio');
?>
{{ Form::close()}}

@stop