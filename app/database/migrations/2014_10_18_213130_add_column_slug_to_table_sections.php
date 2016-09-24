<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddColumnSlugToTableSections extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('sections', function(Blueprint $table)
		{
			$table->string('slug');
		});
		// fill them up
		$sections = Section::all();
		foreach ($sections as $key => $section) {
			$section->slug = Str::Slug($section->name);
			$section->save();
		}
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('sections', function(Blueprint $table)
		{
			$table->dropColumn('slug');
		});
	}

}
