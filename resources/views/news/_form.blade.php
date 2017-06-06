<?php 
use Carbon\Carbon;
$date = new Carbon($news->public_date);
?>

	<div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
	    {!! Form::label('title', 'News Title') !!}
	    {!! Form::text('title', $news->title, ['class' => 'form-control', 'required' => 'required']) !!}
	    <small class="text-danger">{{ $errors->first('title') }}</small>
	</div>

	<div class="form-group{{ $errors->has('date') ? ' has-error' : '' }}">
	    {!! Form::label('date', 'Date (yyyy-mm-dd)') !!}
	    {!! Form::text('date', $date->format('Y-m-d'), ['class' => 'form-control', 'required' => 'required']) !!}
	    <small class="text-danger">{{ $errors->first('date') }}</small>
	</div>

	<div class="form-group">
		<label for="content">Content</label>
		<input id="content" name="content" type="text" value="{{ htmlentities($news->content) }}">
	</div>

<input type="hidden" name="from" value ="{{$request->get('from')}}">
