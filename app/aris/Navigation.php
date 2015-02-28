<?php namespace Aris ;

use Section; // (from root, so that it doesnt think we're looking for Aris\Section)
use Page;
class Navigation
{

	function __construct()
	{
		# code...
	}
	public function renderFullNav(){
			$fullnav ="";
			// Top Nav (About us - etc)
			$fullnav .= '<ul class="sections">';
			$sections = (new Node)->topLevel();
			foreach ($sections as $key => $section) {
				if ($section->hasChildren()) {
					$fullnav .= '<li>' . $section->name  ;
					$fullnav .= '<i class="fa fa-caret-down"></i>';
					$fullnav .= '<div class="navigation_wrapper">';
						$fullnav .= '<div class="nav_title"><h2>'.$section->name.'</h2></div>';

						// Navigation Image
						$fullnav .= '<div class="section_image">';
							$fullnav .= '<img src="/img/featured/sections/'.$section->getLink().'.jpg">';
						$fullnav .= '</div>';

						// Navigation Description
						$fullnav .= '<div class="section_description">';
							$fullnav .= '<div class="desc">'.$section->excerpt.'</div>';
						$fullnav .= '</div>';

						// Navigation Left panel
						$fullnav .= '<div class="section_nav_list">';
							$fullnav .= '<ul>';
							foreach ($section->children() as $key => $subsection) {
								if ($subsection->hasChildren()) {
									// Navigation right panel
									$fullnav .= '<li class="haschildren">' . $subsection->name ;
										$fullnav .= '<div class="section_subnav_list">';
											$fullnav .= '<ul>';
											foreach ($subsection->children() as $key => $page) {
												$fullnav .= '<li><a href="/' . $page->getLink() . '">' . $page->name . '</a></li>';
											}
											$fullnav .= '</ul>';
										$fullnav .= '</div>';// section_subnav_list
									$fullnav .= '</li>'; // haschildren
								} else {

									$fullnav .= '<li class="nochildren"><a href="/' . $subsection->getLink() . '">'.$subsection->name.'</a></li>';
								}
							}
							$fullnav .= '</ul>';
						$fullnav .= '</div>'; // section_nav_list

					$fullnav .= '</div>'; // navigation_wrapper
				} else {
					$fullnav .= '<li><a href="/' . $section->getLink() . '">' . $section->name . '</a>' ;
				}
				$fullnav .= '</li>';
			}
			$fullnav .= '</ul>'; //sections
			return $fullnav;
		}

	public function renderMobileNav(){
		$mobilenav = "";
		$sections = (new Node)->topLevel();
		foreach ($sections as $key => $section) {
			$mobilenav .= '<li><h4>' . $section->name . '</h4>';

			$mobilenav .= '<ul class="subsections">';

			$subsections = $section->children();
			foreach ($subsections as $key => $subsection) {
				$mobilenav .= '<li>';
				$mobilenav .= '<a href="/'.$subsection->getLink().'">' . $subsection->name . '</a>';
				$mobilenav .= '</li>';
			}
			$mobilenav .= '</ul>';
			$mobilenav .= '</li>';
		}
		return $mobilenav;
	}


	public static function renderBreadCrumbs($node){
		$bc = $node->name;
		while ($node->hasParent()) {
			$node = $node->parent();
			$bc = '<a href=/' . $node->getLink() . ' > ' . $node->name . '</a> > ' . $bc;
		}

		$bc = '<div class="breadcrumbs">You are here: <a href="/">Home</a> >'. $bc . '</div>';
		echo $bc;
	}

}