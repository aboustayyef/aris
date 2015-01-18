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
	<?php
		echo '<h1>Sections</h1>';
		echo '<ul>';
		$sections = (new Node)->topLevel();
		foreach ($sections as $key => $section) {
			echo '<li>' . $section->name ;//. ' ( ' . $section->id . ' )';
			echo '<ul>';

			$subsections = $section->children();
			foreach ($subsections as $key => $subsection) {
				echo '<li>' . $subsection->name ;//. ' ( ' . $subsection->id . ' )</li>';
				$pages = $subsection->children();
				echo '<ul>';
				foreach ($pages as $key => $page) {
					echo "<li>$page->name</li>";
				}
				echo '</ul>';
			}
			echo '</ul>';
			echo '</li>';
		}
	?>
</body>
</html>