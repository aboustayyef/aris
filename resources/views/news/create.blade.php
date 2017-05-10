<?php 
$now = new Carbon\Carbon;
?>

@extends('layouts.admin')

@section('content')

<form method="POST" action="/news" accept-charset="UTF-8" novalidate>

	{{csrf_field()}}

	<div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
	    {!! Form::label('title', 'Title') !!}
	    {!! Form::text('title', null, ['class' => 'form-control', 'required' => 'required']) !!}
	    <small class="text-danger">{{ $errors->first('title') }}</small>
	</div>

	<div class="form-group{{ $errors->has('date') ? ' has-error' : '' }}">
	    {!! Form::label('date', 'Date (yyyy-mm-dd)') !!}
	    {!! Form::text('date', null, ['class' => 'form-control', 'required' => 'required']) !!}
	    <small class="text-danger">{{ $errors->first('date') }}</small>
	</div>

	<div class="form-group{{ $errors->has('content') ? ' has-error' : '' }}">
	    {!! Form::label('content', 'Content: ') !!}
	    {!! Form::textarea('content', null, ['class' => 'form-control', 'required' => 'required']) !!}
	    <small class="text-danger">{{ $errors->first('content') }}</small>
	</div>


<button type="submit" class="btn btn-default">Submit</button>

{{-- @include('partials.scratchpad') --}}


@include('tinyMCEScript', ['selector' => '#content', 'uploadImage' => false])

</form>

@stop