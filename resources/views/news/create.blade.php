<?php 
$now = new Carbon\Carbon;
?>

@extends('layouts.admin')

@section('content')

@include('partials.cancellink')

<h2>Create Story</h2>

<form method="POST" action="/news" accept-charset="UTF-8" novalidate>

	{{csrf_field()}}

	@include('news._form')
	<button type="submit" class="btn btn-default">Submit</button>

@include('partials.scratchpad')

{{-- @include('partials.scratchpad') --}}


@include('tinyMCEScript', ['selector' => '#content', 'uploadImage' => false])

</form>

@stop