<?php 
	// This page displays a list of pages under a subsection
	// Subsections have their own descriptions and (optional) images

	$section = Section::where('slug', $subsection);
	if ($section->count() == 0) {
			die('section does not exist');
		}	

	// section does exists

	$section = $section->first();
	$pages = $section->pages;
?>
<h1>{{$section->name}}</h1>
<p>{{$section->description}}</p>

@foreach($pages as $page)
	{{$page->title}}<br>
@endforeach