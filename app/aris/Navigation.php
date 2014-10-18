<?php namespace Aris ;

use Section; // (from root, so that it doesnt think we're looking for Aris\Section)

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
			echo '<li>' . $major->name ;//. ' ( ' . $major->id . ' )';
			echo '<ul>';

			$children = Section::find($major->id)->children();
			foreach ($children as $key => $child) {
				echo '<li>' . $child->name ;//. ' ( ' . $child->id . ' )</li>';
			}
			echo '</ul>';
			echo '</li>';
		}
	}

}