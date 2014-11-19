<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateGoodPracticesHasHardSkillsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('Good_Practices_has_Hard_Skills', function(Blueprint $table)
		{
			$table->integer('Good_Practices_ID')->index('fk_Good_Practices_has_Hard_Skills_Good_Practices1');
			$table->integer('Hard_Skills_ID')->index('fk_Good_Practices_has_Hard_Skills_Hard_Skills1');
			$table->primary(['Good_Practices_ID','Hard_Skills_ID']);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('Good_Practices_has_Hard_Skills');
	}

}
