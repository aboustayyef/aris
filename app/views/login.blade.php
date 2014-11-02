@extends('layouts.admin')

@section('content')

	<h2>Please sign in</h2>
	<hr>
	@include('partials.formerrors')

	{{ Form::open(array('route'=>'session.store')) }}
        <div class="row">
	        <div class="form-group col-md-6 col-lg-4">
			    {{ Form::label('email', 'Email')}}
				{{ Form::text('email', null ,['placeholder' => 'Email Address', 'class'=>'form-control']) }}
			</div>
		</div>
		<div class="row">
			<div class="form-group col-md-6 col-lg-4">
			    {{ Form::label('password', 'Password')}}
				{{ Form::password('password', ['class'=>'form-control']) }}
			</div>
		</div>
        <button type="submit" class="btn btn-default">Submit</button>    
     {{ Form::close() }}
@stop