@extends('layouts.main')
@section('content')
<div class="inner">


	<div id="content-area">	
		<h1>{{$news->title}}</h1>
		<?php 
			$date = new dateTime($news->dateCreated);
			$date = $date->format('F jS, Y');
		?>
		<small class="meta">{{$date}}</small>
		@if(!empty($news->featured_image))
			<div class="featured_image"><img src="{{$news->featured_image}}" alt=""></div>
		@endif
		{{$news->content}}
	</div>
	

</div>

@stop