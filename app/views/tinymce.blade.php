<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Tiny MCE Testing</title>
</head>
<body>
	<h1>TinyMCE and File Manager Testing</h1>
	{{ Form::open(array('url' => '/foo/bar')) }}
		<textarea name="" id="textarea" cols="200" rows="30"></textarea>
	{{ Form::close() }}
</body>
<script src ="{{asset('js/tinymce/tinymce.min.js')}}"></script>
</html>