<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	@if ($errors->any())
	    <ul>
	        {{implode('',$errors->all('<li>:message</li>'))}}
	    </ul>			
	@endif
	{{ Form::open(array('route' => 'page.store')) }}

		{{ Form::label('title', 'Title')}}
		{{ Form::text('title', null, ['placeholder' => 'Page Title']) }}
	<br>
		<?php 		
			$sections = Section::all()->toArray();
			$sectionsArray = [];
			foreach ($sections as $key => $section) {
				$sectionsArray[$section['id']] = $section['name'];
			}
		?>

		{{ Form::label('section', 'Section')}}
		{{Form::select('section', $sectionsArray)}}
	<br>

		{{ Form::label('content', 'Content')}}
		{{ Form::text('content', null,['id'=>'content']) }}
		
	{{ Form::submit('Submit it') }}

	{{ Form::close() }}
</body>

<!-- Ignite TinyMce -->

<script src ="{{asset('js/tinymce/tinymce.min.js')}}"></script>
<script>
	tinymce.init({
    selector: "#content",
    theme: "modern",
    width: 780,
    height: 300,
    relative_urls: false,
    plugins: [
         "advlist autolink link image lists charmap print preview hr anchor pagebreak",
         "searchreplace wordcount visualblocks visualchars insertdatetime media nonbreaking",
         "table contextmenu directionality emoticons paste textcolor responsivefilemanager code"
   ],
   toolbar1: "undo redo | bold italic underline | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | styleselect",
   toolbar2: "| responsivefilemanager | link unlink anchor | image media | forecolor backcolor  | print preview code ",
   image_advtab: true ,
   
   external_filemanager_path:"/filemanager/",
   filemanager_title:"Responsive Filemanager" ,
   external_plugins: { "filemanager" : "/filemanager/plugin.min.js"}
 });
</script>
</html>