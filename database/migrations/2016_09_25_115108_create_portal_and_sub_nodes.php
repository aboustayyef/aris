<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Aris\Node;

class CreatePortalAndSubNodes extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */

	public function up()
	{
		/**
		 * Portal Menu
		 */
		$portal = new Node;
		$portal->name = "Portal";
		$portal->excerpt = "A Gateway to knowledge";
		$portal->content = "<h4>A Gateway to knowledge</h4>";
		$portal->type = "normal";
		$portal->slug = "portal";
		$portal->save();

		/**
		 * Portal SubMenus:
		 * 	Students
		 * 	Parents
		 * 	Staff
		 */
		
		$students = new Node;
		$students->name = "Students";
		$students->excerpt = "Find resources and links that are helpful to students";
		$students->type = "normal";
		$students->slug = "students";
		$students->parent_id = $portal->id;
		$students->save();

			$students_quicklinks = new Node;
			$students_quicklinks->name = "Quick Links";
			$students_quicklinks->excerpt = "Quick Links";
			$students_quicklinks->type = "Normal";
			$students_quicklinks->slug = "quick-links";
			$students_quicklinks->parent_id = $students->id;
			$students_quicklinks->content = '<p>Quick Links for Students</p><ul><li><a href="#">First Link. Add more</a></li></ul>';
			$students_quicklinks->save();

			$students_forms = new Node;
			$students_forms->name = "Student Forms";
			$students_forms->excerpt = "Student Forms";
			$students_forms->type = "Normal";
			$students_forms->slug = "forms";
			$students_forms->parent_id = $students->id;
			$students_forms->content = '<p>Forms for students</p><ul><li><a href="#">First Form. Add more</a></li></ul>';
			$students_forms->save();

		$parents = new Node;
		$parents->name = "Parents";
		$parents->excerpt = "Find resources and links that are helpful to parents";
		$parents->type = "normal";
		$parents->slug = "parents";
		$parents->parent_id = $portal->id;
		$parents->save();

			$parents_resources = new Node;
			$parents_resources->name = "Resources";
			$parents_resources->excerpt = "Resources For Parents";
			$parents_resources->type = "Normal";
			$parents_resources->slug = "resources";
			$parents_resources->parent_id = $parents->id;
			$parents_resources->content = '<p>Resources for parents</p><ul><li><a href="#">First Link. Add more</a></li></ul>';
			$parents_resources->save();

			$parents_forms = new Node;
			$parents_forms->name = "Parent Forms";
			$parents_forms->excerpt = "Parent Forms";
			$parents_forms->type = "Normal";
			$parents_forms->slug = "forms";
			$parents_forms->parent_id = $parents->id;
			$parents_forms->content = '<p>Forms for parents</p><ul><li><a href="#">First Form. Add more</a></li></ul>';
			$parents_forms->save();

		$staff = new Node;
		$staff->name = "Staff";
		$staff->excerpt = "Find resources and links that are helpful to staff";
		$staff->type = "normal";
		$staff->slug = "staff";
		$staff->parent_id = $portal->id;
		$staff->save();

			$staff_resources = new Node;
			$staff_resources->name = "Resources";
			$staff_resources->excerpt = "Resources for Staff";
			$staff_resources->type = "Normal";
			$staff_resources->slug = "resources";
			$staff_resources->parent_id = $staff->id;
			$staff_resources->content = '<p>Resources for staff</p><ul><li><a href="#">First Link. Add more</a></li></ul>';
			$staff_resources->save();

			$staff_forms = new Node;
			$staff_forms->name = "Staff Forms";
			$staff_forms->excerpt = "Staff Forms";
			$staff_forms->type = "Normal";
			$staff_forms->slug = "forms";
			$staff_forms->parent_id = $staff->id;
			$staff_forms->content = '<p>Forms for staff</p><ul><li><a href="#">First Form. Add more</a></li></ul>';
			$staff_forms->save();

		Cache::flush();

	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		//
	}

}
