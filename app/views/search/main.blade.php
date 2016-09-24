<?php 
use Aris\Node;
use Aris\News;
use Aris\People;
?>
@extends('layouts.main')

@section('title')
	<title>Search Results for {{$query}} | ARIS</title>
@stop

@section('content')

<div class="inner">

	<div id="content-area">
		<h1>Search Results for "{{$query}}"</h1>
		
		{{-- Page Results --}}
		@if ($pageResults->count() > 0)
			<hr>
			<h2>Page Results:</h2>
			<ul>
				@foreach($pageResults as $result)
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
		@endif
		
		{{-- News Results --}}
		@if ($newsResults->count() > 0)
			<hr>
			<h2>News Results:</h2>
			<ul>
				@foreach($newsResults as $result)
					<?php 
						$node = News::find($result->id);
					?>
					<li>
						<a href="/news/{{$result->slug}}">{{$result->title}}</a>
					</li>

				@endforeach
			</ul>
		@endif
	
		{{-- News Results --}}
		@if ($peopleResults->count() > 0)
			<hr>
			<h2>People Results:</h2>
			<ul>
				@foreach($peopleResults as $result)
					<?php 
						$node = People::find($result->id);
					?>
					<li>
						<a href="/people/{{$result->slug}}">{{$result->title}} {{$result->firstname}} {{$result->lastname}}</a>
							- {{$result->designation}}
					</li>

				@endforeach
			</ul>
		@endif

	</div>
	
</div>

@stop