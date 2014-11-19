<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToLearningMaterialsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('Learning_Materials', function(Blueprint $table)
		{
			$table->foreign('Media_Types_ID', 'fk_Learning_Materials_Media_Types1')->references('ID')->on('Media_Types')->onUpdate('NO ACTION')->onDelete('NO ACTION');
			$table->foreign('Categories_ID', 'fk_Learning_Materials_Categories1')->references('ID')->on('Categories')->onUpdate('NO ACTION')->onDelete('NO ACTION');
			$table->foreign('Countries_ID', 'fk_Learning_Materials_Countries1')->references('ID')->on('Countries')->onUpdate('NO ACTION')->onDelete('NO ACTION');
			$table->foreign('Languages_ID', 'fk_Learning_Materials_Languages1')->references('ID')->on('Languages')->onUpdate('NO ACTION')->onDelete('NO ACTION');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('Learning_Materials', function(Blueprint $table)
		{
			$table->dropForeign('Media_Types_ID');
			$table->dropForeign('Categories_ID');
			$table->dropForeign('Countries_ID');
			$table->dropForeign('Languages_ID');
		});
	}

}
