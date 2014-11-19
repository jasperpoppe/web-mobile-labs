<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToUsersHasLearningMaterialsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('Users_has_Learning_Materials', function(Blueprint $table)
		{
			$table->foreign('Users_ID', 'fk_Users_has_Learning_Materials_Users1')->references('ID')->on('users')->onUpdate('NO ACTION')->onDelete('NO ACTION');
			$table->foreign('Learning_Materials_ID', 'fk_Users_has_Learning_Materials_Learning_Materials1')->references('ID')->on('Learning_Materials')->onUpdate('NO ACTION')->onDelete('NO ACTION');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('Users_has_Learning_Materials', function(Blueprint $table)
		{
			$table->dropForeign('Users_ID');
			$table->dropForeign('Learning_Materials_ID');
		});
	}

}
