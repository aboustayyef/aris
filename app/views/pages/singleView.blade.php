@extends('layouts.main')

@section('content')
<div class="inner">
	<div id="material">	

		<h1>{{$node->name}}</h1>
		{{$node->content}}
		</div>
	
	<aside>
	</aside>
</div>

@stop