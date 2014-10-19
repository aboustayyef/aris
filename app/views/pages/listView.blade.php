<?php 
	$section = Section::where('slug',$subsection)->first();
	$pages = $section->pages;
?>
<h1>{{$section->name}}</h1>
<p>{{$section->description}}</p>
<!-- Section Image? -->
@foreach($pages as $page)
	<a href="{{$page->url()}}">{{$page->title}}</a><br>
@endforeach