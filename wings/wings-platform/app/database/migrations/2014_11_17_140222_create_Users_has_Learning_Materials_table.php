<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateUsersHasLearningMaterialsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('Users_has_Learning_Materials', function(Blueprint $table)
		{
			$table->integer('Users_ID')->index('fk_Users_has_Learning_Materials_Users1');
			$table->integer('Learning_Materials_ID')->index('fk_Users_has_Learning_Materials_Learning_Materials1');
			$table->primary(['Users_ID','Learning_Materials_ID']);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('Users_has_Learning_Materials');
	}

}
