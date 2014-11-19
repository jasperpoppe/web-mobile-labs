<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToLearningMaterialsHasTagsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('Learning_Materials_has_Tags', function(Blueprint $table)
		{
			$table->foreign('Learning_Materials_ID', 'fk_Learning_Materials_has_Tags_Learning_Materials1')->references('ID')->on('Learning_Materials')->onUpdate('NO ACTION')->onDelete('NO ACTION');
			$table->foreign('Tags_ID', 'fk_Learning_Materials_has_Tags_Tags1')->references('ID')->on('Tags')->onUpdate('NO ACTION')->onDelete('NO ACTION');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('Learning_Materials_has_Tags', function(Blueprint $table)
		{
			$table->dropForeign('Learning_Materials_ID');
			$table->dropForeign('Tags_ID');
		});
	}

}
