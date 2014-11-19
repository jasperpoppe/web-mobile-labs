<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToGoodPracticesHasSoftSkillsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('Good_Practices_has_Soft_Skills', function(Blueprint $table)
		{
			$table->foreign('Good_Practices_ID', 'fk_Good_Practices_has_Soft_Skills_Good_Practices1')->references('ID')->on('Good_Practices')->onUpdate('NO ACTION')->onDelete('NO ACTION');
			$table->foreign('Soft_Skills_ID', 'fk_Good_Practices_has_Soft_Skills_Soft_Skills1')->references('ID')->on('Soft_Skills')->onUpdate('NO ACTION')->onDelete('NO ACTION');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('Good_Practices_has_Soft_Skills', function(Blueprint $table)
		{
			$table->dropForeign('Good_Practices_ID');
			$table->dropForeign('Soft_Skills_ID');
		});
	}

}
