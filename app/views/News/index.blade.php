@extends('layouts.main')

@section('content')

<div class="inner">


	<div id="content-area">
		<h1>News</h1>

		@if(Auth::Check())
		<div id="adminCreate">
			<a href="{{route('news.create')}}">Create News Item</a>
		</div>
		@endif

		@foreach($news as $newsItem)
			<div class="listModule">
				<a href="/news/{{$newsItem->slug}}"><h3>{{$newsItem->title}}</h3></a>
				@if($newsItem->image())
					<div class="featuredImage">
						<a href="/news/{{$newsItem->slug}}"><img src ="{{$newsItem->image()}}"></a>
					</div>
				@endif
				<p>{{$newsItem->excerpt()}}</p>
				
				@if(Auth::Check())
					@include('partials.newsmetadata')
				@endif
			
			</div>
		@endforeach
	
	<div id="pagination">
		<?php echo $news->links(); ?>
	</div>

	</div>

	@include('partials.newssidebar')

</div>

@stop