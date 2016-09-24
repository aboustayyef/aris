@extends('layouts.admin')

@section('content')

	<h2>Please sign in</h2>
	<hr>
	@include('partials.formerrors')

	<form method="POST" action="/session" accept-charset="UTF-8">
		<input type="hidden" name="_token" value="{{csrf_token()}}">
        <div class="row">
	        <div class="form-group col-md-6 col-lg-4">
			    <label for="email">Email</label>
				<input placeholder="Email Address" class="form-control" name="email" type="text" id="email">
			</div>
		</div>
		<div class="row">
			<div class="form-group col-md-6 col-lg-4">
			    <label for="password">Pass Phrase</label>
				<input class="form-control" name="password" type="password" value="" id="password">
			</div>
		</div>

		<input type="hidden" name="return" value="{{Input::get('return')}}">
        
        <button type="submit" class="btn btn-default">Submit</button>    
     </form>
@stop