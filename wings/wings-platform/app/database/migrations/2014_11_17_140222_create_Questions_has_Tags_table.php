<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateQuestionsHasTagsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('Questions_has_Tags', function(Blueprint $table)
		{
			$table->integer('Questions_ID')->index('fk_Questions_has_Tags_Questions1');
			$table->integer('Tags_ID')->index('fk_Questions_has_Tags_Tags1');
			$table->primary(['Questions_ID','Tags_ID']);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('Questions_has_Tags');
	}

}
