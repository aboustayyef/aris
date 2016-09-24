<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTableNodes extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('nodes', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('name');
			$table->tinyInteger('parent_id')->nullable();
			$table->text('excerpt')->nullable();
			$table->text('content')->nullable();
			$table->string('feature_image')->nullable();
			$table->string('type')->default('normal');
			$table->string('slug');
			$table->string('redirect')->nullable();
			$table->timestamps();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('nodes');
	}

}
