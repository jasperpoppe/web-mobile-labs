<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToGoodPracticesHasServicesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('Good_Practices_has_Services', function(Blueprint $table)
		{
			$table->foreign('Good_Practices_ID', 'fk_Good_Practices_has_Services_Good_Practices1')->references('ID')->on('Good_Practices')->onUpdate('NO ACTION')->onDelete('NO ACTION');
			$table->foreign('Services_ID', 'fk_Good_Practices_has_Services_Services1')->references('ID')->on('Services')->onUpdate('NO ACTION')->onDelete('NO ACTION');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('Good_Practices_has_Services', function(Blueprint $table)
		{
			$table->dropForeign('Good_Practices_ID');
			$table->dropForeign('Services_ID');
		});
	}

}
