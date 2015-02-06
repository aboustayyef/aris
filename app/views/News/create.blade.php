@extends('layouts.admin')

@section('content')

{{ Form::open(array('route' => 'news.store')); }}

{{ FormField::title() }}
{{ FormField::content(['type' => 'textarea']) }}

<button type="submit" class="btn btn-default">Submit</button>

<?php
// Trigger TinyMCE for editing
Aris\Helpers::activateAdvancedEditor('#content');
?>

{{ Form::close()}}

@stop