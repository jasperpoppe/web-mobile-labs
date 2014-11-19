<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToGoodPracticesHasClientDescriptionsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('Good_Practices_has_Client_Descriptions', function(Blueprint $table)
		{
			$table->foreign('Good_Practices_ID', 'fk_Good_Practices_has_Client_Descriptions_Good_Practices1')->references('ID')->on('Good_Practices')->onUpdate('NO ACTION')->onDelete('NO ACTION');
			$table->foreign('Client_Descriptions_ID', 'fk_Good_Practices_has_Client_Descriptions_Client_Descriptions1')->references('ID')->on('Client_Descriptions')->onUpdate('NO ACTION')->onDelete('NO ACTION');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('Good_Practices_has_Client_Descriptions', function(Blueprint $table)
		{
			$table->dropForeign('Good_Practices_ID');
			$table->dropForeign('Client_Descriptions_ID');
		});
	}

}
