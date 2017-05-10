<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddSectionImageAndSectionDescriptionToSections extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('sections', function(Blueprint $table)
		{
			$table->string('image')->nullable();
			$table->text('description')->nullable();
		});
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
			$table->dropColumn('image');
			$table->dropColumn('description');
		});
	}

}
