@extends('layouts.main')

@section('content')

<div class="inner">

	@include('partials.breadcrumbs')

	<div id="content-area">
		<h1>{{$node->name}}</h1>
		<p>{{$node->excerpt}}</p>
		<!-- Section Image? -->
		<?php
		$nodes = $node->children();
		 ?>
		@foreach($nodes as $node)
			<div class="listModule">
				<a href="/{{$node->absoluteSlug()}}"><h2>{{$node->name}}</h2></a>
				@if($node->image())
					<div class="featuredImage">
						<a href="/{{$node->absoluteSlug()}}"><img src ="{{$node->image()}}"></a>
					</div>
				@endif
				<p>{{$node->excerpt()}}</p>
			</div>
		@endforeach
	</div>

	@include('partials.sidebar')

</div>

@stop