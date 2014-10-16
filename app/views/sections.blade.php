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
		$majors = (new Section)->majors();
		foreach ($majors as $key => $major) {
			echo '<li>' . $major->name . ' ( ' . $major->id . ' )';
			echo '<ul>';

			$children = Section::find($major->id)->children();
			foreach ($children as $key => $child) {
				echo '<li>' . $child->name . ' ( ' . $child->id . ' )</li>';
			}
			echo '</ul>';
			echo '</li>';
		}
	?>
</body>
</html>