@extends('layouts.admin')

@section('content')

<?php
	if (Session::has('message')) {
		echo Session::get('message');
	}
?>

<hr>
<h2>Manage Pages</h2>

<?php
	echo '<ul>';
		$sections = (new Node)->topLevel();
		foreach ($sections as $key => $section) {
			echo "<li>$section->name ";
			if (!$section->hasChildren()) {
				echo '<a href="/pages/' . $section->id . '/edit">edit</a>';
			} else {
				$subsections = $section->children();
				echo "<ul>";
				foreach ($subsections as $key => $subsection) {
					echo "<li>$subsection->name ";
					if (!$subsection->hasChildren()) {
						echo '<a href="/pages/' . $subsection->id . '/edit">edit</a>';
					}else{
						$pages = $subsection->children();
						echo "<ul>";
							foreach ($pages as $key => $page) {
								echo '<li>'.$page->name. ' <a href="/pages/' . $page->id . '/edit">edit</a></li>';
							}
						echo "</ul>";
					}
					echo "</li>";
				}
				echo "</ul>";
			}
			echo "</li>";
		}
	echo "</ul>";
?>

@stop