<?php namespace Aris;

use Section; // (from root, so that it doesnt think we're looking for Aris\Section)
use Page;
use URL;
use Form;

	class Ajax
	{
		static function renderTableViewOfPagesInSection($sectionId){
			/**
		 	* 	This class generates the list of pages with edit and delete buttons from a selected section.
		 	*/
			$section = Section::find($sectionId);
			$pages = $section->children();
			if ($pages->count() == 0) {
				return '<p>This Section has no pages. Please click on the "Create new page" button above or choose another section</p>';
			}
		?>
			<table class="table table-hover">
				<thead>
					<tr>
						<th>Page Title</th>
						<th>Edit</th>
						<th>Delete</th>
					</tr>
				</thead>
				<tbody>
					<?php 
					foreach ($pages as $key => $page) {
						?>
						<tr>
						<?php
						echo '<td class="col-md-8">'.$page->title.'</td>';
						echo '<td class="col-md-2"><a href="/pages/' . $page->slug . '/edit" class="btn btn-primary">Edit</a></td>';
						echo '<td class="col-md-2">';
						
						echo Form::open(array('route' => array('pages.destroy', $page->slug), 'method' => 'delete'));
						echo '<button type="submit" class="btn btn-danger btn-mini">Delete</button>';
						echo Form::close();
						echo '</td>';
						?>
						</tr>
						<?php
					}
					?>
				</tbody>
			</table>
			<?php
		}
	}

?>