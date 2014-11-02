@extends('layouts.admin')

@section('content')


<h2>Create a New Page</h2>
<a href="/pages/create" class="btn btn-warning">Click here to create a new page</a>
<hr>
<h2>Or Manage Existing Pages <small>Pick Section to manage</small></h2>

	<div class="form-group">
		<?php (new Aris\Navigation)->buildSelectList();?>
	</div>

	<div id="dynamic">
		<?php 
			Aris\Ajax::renderTableViewOfPagesInSection(10) // 10 is default (Principal's Welcome)
		?>
	</div>
	
	<!-- Script to change list on select -->
	<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
	<script>
		$(document).ready(function(){
			$('#section').on('change', function(){
				var $section = $(this).find(":selected").val();
				$.get( "/ajaxEditSections/" + $section, function( data ) {
				  $( "#dynamic" ).html( data );
				  console.log( "Load was performed." );
				});
			});
		});
	</script>
@stop