<?php 

// This view displays page with the slug $page 
$pageExists = Page::where('slug', $page);
if ($pageExists->count() == 0) {
	die('page does not exist');
}

// if page does exist
$page = $pageExists->first();
?>
<h1>{{$page->title}}</h1>
{{$page->content}}