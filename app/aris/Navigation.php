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
			echo '<li>' . $section->name ;
		
			echo '<ul class="subsections"';
				if (file_exists(public_path().'/img/featured/sections/'.$section->slug.'.jpg')) {
					//echo '<div class="sectionImage"><img src="' . asset('img/featured/sections/'.$section->slug.'.jpg') . '"></div>';
					echo 'style="background-image:url(../img/featured/sections/'.$section->slug.'.jpg); background-repeat: no-repeat; background-position:right center"'; 
				}
			echo '>';

			$subsections = Section::find($section->id)->subsections();
			foreach ($subsections as $key => $subsection) {
				echo '<li>';
				echo '<a href="'.$subsection->url().'">' . $subsection->name . '</a>';
				$pages = Section::find($subsection->id)->children()->count();
				if ($pages > 0) {
					echo '<ul class="pages">';
					$pages = Section::find($subsection->id)->children();
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