<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateGoodPracticesHasSectorsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('Good_Practices_has_Sectors', function(Blueprint $table)
		{
			$table->integer('Good_Practices_ID')->index('fk_Good_Practices_has_Sectors_Good_Practices1');
			$table->integer('Sectors_ID')->index('fk_Good_Practices_has_Sectors_Sectors1');
			$table->primary(['Good_Practices_ID','Sectors_ID']);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('Good_Practices_has_Sectors');
	}

}
