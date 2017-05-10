<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddColumnsToSection extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('sections', function(Blueprint $table)
		{
			$table->string('featureImage');
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
			$table->dropColumn('featureImage');
		});
	}

}
