<?php 
	$section = Section::where('slug',$subsection)->first();
	$pages = $section->children();
?>

<h1>{{$section->name}}</h1>
<p>{{$section->description}}</p>
<!-- Section Image? -->
@foreach($pages as $page)
<?php 
	// Title
	if ($page->title) {
		$title = $page->title;
	} else {
		$title = $page->name;
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
	<a href="{{$page->url()}}"><h2>{{$title}}</h2></a><br>
	<p>{{$description}}</p>
@endforeach