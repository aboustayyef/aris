<!DOCTYPE html>
<?php
use Aris\Node;
?>

<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Sections</title>
</head>
<body>
	<h1>Sections</h1>
	<ul>
		@php $sections = (new Node)->topLevel(); @endphp
		@foreach ($sections as $section)
			<li >{{$section->name}}
				<ul>
					@php $subsections = $section->children();@endphp
					@foreach ($subsections as $subsection)
						<li class="closed">
							{{$subsection->name}}
							@php $pages = $subsection->children(); @endphp
							<ul>
								@foreach ($pages as $page)
									<li>{{$page->name}}</li>
								@endforeach
							</ul>
						</li>	
					@endforeach
				</ul>
			</li>

			@endforeach
		</ul>

</body>
</html>