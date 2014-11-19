<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateLearningMaterialsHasTagsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('Learning_Materials_has_Tags', function(Blueprint $table)
		{
			$table->integer('Learning_Materials_ID')->index('fk_Learning_Materials_has_Tags_Learning_Materials1');
			$table->integer('Tags_ID')->index('fk_Learning_Materials_has_Tags_Tags1');
			$table->primary(['Learning_Materials_ID','Tags_ID']);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('Learning_Materials_has_Tags');
	}

}
