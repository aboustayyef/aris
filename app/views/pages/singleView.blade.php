@extends('layouts.main')

@section('content')
<div class="inner">

	@include('partials.breadcrumbs')

	<div id="content-area">	
		<h1>{{$node->name}}</h1>
		{{$node->content}}
	</div>
	
	@include('partials.sidebar')

</div>

@stop