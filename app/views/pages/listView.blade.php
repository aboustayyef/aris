@extends('layouts.main')

@section('content')

<div class="inner">
	<h1>{{$section->name}}</h1>
	<p>{{$section->description}}</p>
	<!-- Section Image? -->
	<?php 
	$pages = $section->children();
	 ?>
		@foreach($pages as $page)
		<?php 
			// Title
			if ($page->title) {
				$page_title = $page->title;
			} else {
				$page_title = $page->name;
			}

			// Description
			if ($page->description){
				$description = $page->description;
			}else{
				$description = "Remember to Add an excerpts field for pages";
			}

			// Image
			// To Do

		?>
			<a href="{{$page->url()}}"><h2>{{$page_title}}</h2></a><br>
			<p>{{$description}}</p>
		@endforeach
</div>
@stop