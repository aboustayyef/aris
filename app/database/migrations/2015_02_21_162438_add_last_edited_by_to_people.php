<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddLastEditedByToPeople extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('people', function(Blueprint $table)
		{
			$table->string('last_edited_by');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('people', function(Blueprint $table)
		{
			$table->dropColumn('last_edited_by');
		});
	}

}
