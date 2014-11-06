@extends('layouts.main')

@section('content')
<div class="inner">
	<div id="material">	

		<h1>{{$page->title}}</h1>
		{{$page->content}}
		</div>
	
	<aside>
	</aside>
</div>

@stop