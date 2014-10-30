<?php 
	$section = Section::where('slug',$subsection)->first();
	$pages = $section->children();
?>

<h1>{{$section->name}}</h1>
<p>{{$section->description}}</p>
<!-- Section Image? -->
@foreach($pages as $page)
<?php 
	if ($page->title) {
		$title = $page->title;
	} else {
		$title = $page->name;
	}
?>
	<a href="{{$page->url()}}">{{$title}}</a><br>
@endforeach