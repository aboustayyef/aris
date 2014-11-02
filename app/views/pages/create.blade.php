@extends('layouts.admin')

@section('content')
	
	<h2>Create Page</h2>
	<hr>	
	@include('partials.formerrors')

	{{ Form::open(array('route' => 'pages.store')) }}

	<div class="form-group">
		{{ Form::label('title', 'Title')}}
		{{ Form::text('title', null, ['placeholder' => 'Page Title', 'class'=>'form-control']) }}
	</div>	
	
	<div class="form-group">
		{{ Form::label('section', 'Choose section (Important)')}}
		<?php (new Aris\Navigation)->buildSelectList();?>
	</div>	
	
	<div class="form-group">
		{{ Form::label('content', 'Content')}}
		{{ Form::text('content', null,['id'=>'content', 'placeholder'=>'Insert image by clicking on the icon above']) }}
	</div>	

	<button type="submit" class="btn btn-default">Submit</button>

	{{ Form::close() }}

	<!-- Ignite TinyMce -->
	<?php 
	Aris\Helpers::activateAdvancedEditor('#content');
	?>

@stop