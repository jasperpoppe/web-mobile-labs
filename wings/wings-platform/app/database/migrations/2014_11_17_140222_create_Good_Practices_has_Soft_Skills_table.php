<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateGoodPracticesHasSoftSkillsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('Good_Practices_has_Soft_Skills', function(Blueprint $table)
		{
			$table->integer('Good_Practices_ID')->index('fk_Good_Practices_has_Soft_Skills_Good_Practices1');
			$table->integer('Soft_Skills_ID')->index('fk_Good_Practices_has_Soft_Skills_Soft_Skills1');
			$table->primary(['Good_Practices_ID','Soft_Skills_ID']);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('Good_Practices_has_Soft_Skills');
	}

}
