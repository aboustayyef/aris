@extends('layouts.admin')

@section('content')

			<h2>Create News Item</h2>
			<hr>
			@include('partials.formerrors')

			{{ Form::open(array('route' => 'news.store')) }}

			<div class="form-group">
			    {{ Form::label('title', 'Title')}}
				{{ Form::text('title', null ,['placeholder' => 'Title of News Item', 'class'=>'form-control']) }}
			</div>
			<div class="form-group">
			    {{ Form::label('date', 'Date')}}
				{{ Form::text('date', null ,['placeholder' => 'YYYY-MM-DD', 'class'=>'form-control']) }}
			</div>
			<div class="form-group">
			    {{ Form::label('content', 'News content')}}
				{{ Form::text('content', null ,['id' => 'description', 'class'=>'form-control']) }}
			</div>

			<button type="submit" class="btn btn-default">Submit</button>

			{{ Form::close() }}

			<!-- Ignite TinyMce -->
			<?php
			Aris\Helpers::activateAdvancedEditor('#description',false);
			?>

@stop