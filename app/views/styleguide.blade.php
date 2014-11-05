<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>ARIS - Style Guide</title>
	<link rel="stylesheet" href="{{asset('css/aris_home.css')}}">
	<!-- <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css"> -->
</head>
<body>
	<div style="width:680px;margin:10px auto;padding:10px">
		<h1>ARIS Style Guide</h1>
		<p class="lead">
			This document is a visual reference for the elements in the website. We start by this lead paragraph. Lead paragraphs serve as an executive summary or as an introduction to the rest of the document. They are a bit more pronounced but not too different from the rest of the paragraphs.  
		</p>
		<hr>
		<h2>A header within the document (h2)</h2>
		<p>This is a normal paragraph. several paragraphs are usually used to express the information on a page. This is <a href="#">Link in the paragraph.</a> Readability is important, so we need to keep the maximum width of a line to 75 characters</p>
		<blockquote>An education isn't how much you have committed to memory, or even how much you know. It's being able to differentiate between what you know and what you don't.</blockquote>
		<p>This is a normal paragraph. several paragraphs are usually used to express the information on a page. Readability is important, so we need to keep the maximum width of a line to 75 characters</p>

		<h2>Here's an Image</h2>
		<img src="http://placehold.it/600x300" alt="">
		<div class="caption">This is a caption to the image</div>

		<h2>This is a table</h2>
			@include('partials.tablesample')

	</div>
</body>
</html>