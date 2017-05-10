@extends('layouts.main')

@section('title')
	<title>ARIS - {{$node->name}}</title>
	<meta name="Description" content="{{$node->excerpt()}}">
@stop

@section('facebookMeta')
	<!-- Facebook Open Graph Data -->
    <meta property="og:title" content="ARIS - {{$node->name}}">
    <meta property="og:description" content="ARIS - {{$node->excerpt()}}">
    @if($node->image())
	    <meta property="og:image" content="http://aris.edu.gh{{$node->image()}}">
	@endif
@stop

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
				<a href="/{{$node->getLink()}}"><h2>{{$node->name}}</h2></a>
				@if($node->image())
					<div class="featuredImage">
						<a href="/{{$node->getLink()}}"><img src ="{{$node->image()}}"></a>
					</div>
				@endif
				<p>{{$node->excerpt()}}</p>
			</div>
		@endforeach
	</div>

	@include('partials.sidebar')

</div>

@stop