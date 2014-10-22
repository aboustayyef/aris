<?php namespace Aris ;

use Section; // (from root, so that it doesnt think we're looking for Aris\Section)
use Page;

class Navigation
{
	
	function __construct()
	{
		# code...
	}

	public function displayHTML(){
		echo '<ul class="sections">';
		$sections = (new Section)->sections();
		foreach ($sections as $key => $section) {
			if ($section->name == 'About Us') {
				echo '<li class="active">' . $section->name ;
			} else {
				echo '<li>' . $section->name ;
			}
			
			echo '<ul class="subsections">';

			$subsections = Section::find($section->id)->subsections();
			foreach ($subsections as $key => $subsection) {
				if ($subsection->name == "Principal's Welcome") {
					echo '<li class="active">';
				} else {
					echo '<li>';
				}
				echo '<a href="'.$subsection->url().'">' . $subsection->name . '</a>';
				$pages = Section::find($subsection->id)->pages->count();
				if ($pages > 0) {
					echo '<ul class="pages">';
					$pages = Section::find($subsection->id)->pages;
					foreach ($pages as $key => $page) {
						echo '<li><a href="'.$page->url().'">' . $page->title . '</li></a>';
					}
					echo '</ul>';
				}
				echo '</li>';
			}
			echo '</ul>';
			echo '</li>';
		}
	}

	public function buildSelectList(){
		echo '<select id="section" name="section">';
		$sections = (new Section)->sections();
		foreach ($sections as $key => $section) {
			echo '<option value="" disabled="disabled"> </option>';
			echo '<option value="" disabled="disabled">' . $section->name . '</option>';
			echo '<option value="" disabled="disabled">---------------</option>';
			$subsections = Section::find($section->id)->subsections();
			foreach ($subsections as $key => $subsection) {
				echo '<option value="'. $subsection->id .'">'. $subsection->name .'</option>';
			}
		}
		echo '</select>';
	}

}