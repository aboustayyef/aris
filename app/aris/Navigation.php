<?php namespace Aris ;

use Section; // (from root, so that it doesnt think we're looking for Aris\Section)
use Page;
use Node;
class Navigation
{
	
	function __construct()
	{
		# code...
	}
	public function renderFullNav(){
			// Top Nav (About us - etc)
			echo '<ul class="sections">';
			$sections = (new Node)->topLevel();
			foreach ($sections as $key => $section) {
				echo '<li><a href="/' . $section->absoluteSlug() . '">' . $section->name . '</a>'  ;
				if ($section->hasChildren()) {
					echo '<i class="fa fa-caret-down"></i>';
					echo '<div class="navigation_wrapper">';
						echo '<div class="nav_title"><h2>'.$section->name.'</h2></div>';
						echo '<div class="section_image">';
							echo '<img src="/img/featured/sections/'.$section->slug.'.jpg">';
						echo '</div>';
						echo '<div class="section_description">';
							echo $section->excerpt;
						echo '</div>';
						echo '<div class="section_nav_list">';
							?>
							<ul>
								<li>option a</li>
								<li>option b</li>
								<li>option c
									<div class="section_subnav_list">
										<ul>
											<li>option c 1</li>
											<li>option c 2</li>
											<li>option c 3</li>
											<li>option c 4</li>
										</ul>
									</div>
								</li>
								<li>option d</li>
								<li >option e
									<div class="section_subnav_list">
										<ul>
											<li>option e 1</li>
											<li>option e 2</li>
											<li>option e 3</li>
											<li>option e 4</li>
										</ul>
									</div>
								</li>
							</ul>
							<?php
						echo '</div>';


					echo '</div>';
				}
				echo '</li>';
			}
			echo '</ul>'; //sections
		}
	public function renderFullNav_old(){
		// Top Nav (About us - etc)
		echo '<ul class="sections">';
		$sections = (new Node)->topLevel();
		foreach ($sections as $key => $section) {
			echo '<li><a href="/' . $section->absoluteSlug() . '">' . $section->name . '</a>'  ;
			if ($section->hasChildren()) {
				echo '<i class="fa fa-caret-down"></i>';
				echo '<ul class="subsections"';
					if (file_exists(public_path().'/img/featured/sections/'.$section->slug.'.jpg')) {
						//echo '<div class="sectionImage"><img src="' . asset('img/featured/sections/'.$section->slug.'.jpg') . '"></div>';
						echo 'style="background-image:url(../img/featured/sections/'.$section->slug.'.jpg); background-repeat: no-repeat; background-position:right center"'; 
					}
				echo '>';

				$subsections = $section->children();
				// First Pane navigation list
				foreach ($subsections as $key => $subsection) {
					echo '<li>';
					if ($subsection->hasChildren()) {
						echo $subsection->name.'<i class="fa fa-caret-right"></i>';
						echo '<ul class="pages">';
						$pages = $subsection->children();
						// Second Pane
						foreach ($pages as $key => $page) {
							echo '<li><a href="/'.$page->absoluteSlug().'">' . $page->name . '</li></a>';
						}
						echo '</ul>';
					} else {
						echo '<a href="/' . $subsection->absoluteSlug() . '">' . $subsection->name . '</a>';
					}
					echo '</li>';
				}
				echo '</ul>';
			}
			echo '</li>';
		}
		echo '</ul>';
	}
	public function renderMobileNav(){
		echo '<div id="mobileMenu"><h3><i class="fa fa-bars"></i> Menu</h3>';
		echo '<ul class="sectionsMobile">';
		$sections = (new Node)->topLevel();
		foreach ($sections as $key => $section) {
			echo '<li><h4>' . $section->name . '</h4>';
		
			echo '<ul class="subsections">';

			$subsections = $section->children();
			foreach ($subsections as $key => $subsection) {
				echo '<li>';
				echo '<a href="'.$subsection->absoluteSlug().'">' . $subsection->name . '</a>';
				echo '</li>';
			}
			echo '</ul>';
			echo '</li>';
		}
		echo '<ul>';
		echo '</div>';
	}

	public function buildSelectList($section_id = 10){
		echo '<select id="section" name="section" class="form-control">';
		$sections = (new Node)->topLevel();
		foreach ($sections as $key => $section) {
			echo '<option value="" disabled="disabled"> </option>';
			echo '<option value="" disabled="disabled">' . $section->name . '</option>';
			echo '<option value="" disabled="disabled">---------------</option>';
			$subsections = $section->children();
			foreach ($subsections as $key => $subsection) {
				echo '<option value="'. $subsection->id .'"';
					if ($subsection->id == $section_id) {
						echo 'selected';
					}
				echo '> ' . $subsection->name .'</option>';
			}
		}
		echo '</select>';
	}

	public static function renderBreadCrumbs($node){
		$bc = $node->name;
		while ($node->hasParent()) {
			$node = $node->parent();
			$bc = '<a href=/"' . $node->absoluteSlug() . '">' . $node->name . '</a> >' . $bc;
		}

		$bc = '<div class="breadcrumbs">You are here: <a href="/">Home</a> >'. $bc . '</div>';
		echo $bc;
	}

}