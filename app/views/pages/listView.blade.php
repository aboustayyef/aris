@extends('layouts.main')

@section('content')

<div class="inner">

	@include('partials.breadcrumbs')

	<div id="content-area">
		<h1>{{$node->name}}</h1>
		<p>{{$node->description}}</p>
		<!-- Section Image? -->
		<?php 
		$nodes = $node->children();
		 ?>
		@foreach($nodes as $node)
			<a href="{{$node->absoluteSlug()}}"><h2>{{$node->name}}</h2></a><br>
			<p>{{$node->description}}</p>
		@endforeach
	</div>
	
	@include('partials.sidebar')

</div>

@stop