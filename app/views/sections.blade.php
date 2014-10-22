<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Sections</title>
</head>
<body>
	<?php 
		echo '<h1>Sections</h1>';
		echo '<ul>';
		$sections = (new Section)->sections();
		foreach ($sections as $key => $section) {
			echo '<li>' . $section->name ;//. ' ( ' . $section->id . ' )';
			echo '<ul>';

			$subsections = Section::find($section->id)->subsections();
			foreach ($subsections as $key => $subsection) {
				echo '<li>' . $subsection->name ;//. ' ( ' . $subsection->id . ' )</li>';
			}
			echo '</ul>';
			echo '</li>';
		}
	?>
</body>
</html>