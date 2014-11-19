<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToGoodPracticesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('Good_Practices', function(Blueprint $table)
		{
			$table->foreign('Countries_ID', 'fk_Good_Practices_Countries1')->references('ID')->on('Countries')->onUpdate('NO ACTION')->onDelete('NO ACTION');
			$table->foreign('Project_Types_ID', 'fk_Good_Practices_Project_Types1')->references('ID')->on('Project_Types')->onUpdate('NO ACTION')->onDelete('NO ACTION');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('Good_Practices', function(Blueprint $table)
		{
			$table->dropForeign('Countries_ID');
			$table->dropForeign('Project_Types_ID');
		});
	}

}
