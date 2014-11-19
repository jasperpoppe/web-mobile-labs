<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToQuestionsHasTagsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('Questions_has_Tags', function(Blueprint $table)
		{
			$table->foreign('Questions_ID', 'fk_Questions_has_Tags_Questions1')->references('ID')->on('Questions')->onUpdate('NO ACTION')->onDelete('NO ACTION');
			$table->foreign('Tags_ID', 'fk_Questions_has_Tags_Tags1')->references('ID')->on('Tags')->onUpdate('NO ACTION')->onDelete('NO ACTION');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('Questions_has_Tags', function(Blueprint $table)
		{
			$table->dropForeign('Questions_ID');
			$table->dropForeign('Tags_ID');
		});
	}

}
