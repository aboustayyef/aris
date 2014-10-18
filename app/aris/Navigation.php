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
		echo '<ul>';
		$majors = (new Section)->majors();
		foreach ($majors as $key => $major) {
			echo '<li>' . $major->name ;
			echo '<ul>';

			$children = Section::find($major->id)->children();
			foreach ($children as $key => $child) {
				echo '<li><a href="'.$child->url().'">' . $child->name . '</a></li>';
				$pages = Section::find($child->id)->pages->count();
				if ($pages > 0) {
					echo '<ul>';
					$pages = Section::find($child->id)->pages;
					foreach ($pages as $key => $page) {
						echo '<li><a href="'.$page->url().'">' . $page->title . '</li></a>';
					}
					echo '</ul>';
				}
			}
			echo '</ul>';
			echo '</li>';
		}
	}

}