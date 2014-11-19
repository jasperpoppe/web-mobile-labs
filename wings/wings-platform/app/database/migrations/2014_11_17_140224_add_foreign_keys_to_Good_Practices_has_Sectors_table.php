<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToGoodPracticesHasSectorsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('Good_Practices_has_Sectors', function(Blueprint $table)
		{
			$table->foreign('Good_Practices_ID', 'fk_Good_Practices_has_Sectors_Good_Practices1')->references('ID')->on('Good_Practices')->onUpdate('NO ACTION')->onDelete('NO ACTION');
			$table->foreign('Sectors_ID', 'fk_Good_Practices_has_Sectors_Sectors1')->references('ID')->on('Sectors')->onUpdate('NO ACTION')->onDelete('NO ACTION');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('Good_Practices_has_Sectors', function(Blueprint $table)
		{
			$table->dropForeign('Good_Practices_ID');
			$table->dropForeign('Sectors_ID');
		});
	}

}
