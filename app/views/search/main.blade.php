@extends('layouts.main')

@section('content')

<div class="inner">

	<div id="content-area">
		<h1>{{$title}}</h1>
		<ul>
			@foreach($results as $result)
				<?php 
					$node = Node::find($result->id);
				?>
				<li><a href="{{$result->getLink()}}">{{$result->name}}</a>

				@if($result->hasChildren())
				 (Section)
				@endif
				</li>

			@endforeach
		</ul>
	</div>
	
</div>

@stop