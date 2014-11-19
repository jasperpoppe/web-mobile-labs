<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToGoodPracticesHasHardSkillsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('Good_Practices_has_Hard_Skills', function(Blueprint $table)
		{
			$table->foreign('Good_Practices_ID', 'fk_Good_Practices_has_Hard_Skills_Good_Practices1')->references('ID')->on('Good_Practices')->onUpdate('NO ACTION')->onDelete('NO ACTION');
			$table->foreign('Hard_Skills_ID', 'fk_Good_Practices_has_Hard_Skills_Hard_Skills1')->references('ID')->on('Hard_Skills')->onUpdate('NO ACTION')->onDelete('NO ACTION');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('Good_Practices_has_Hard_Skills', function(Blueprint $table)
		{
			$table->dropForeign('Good_Practices_ID');
			$table->dropForeign('Hard_Skills_ID');
		});
	}

}
