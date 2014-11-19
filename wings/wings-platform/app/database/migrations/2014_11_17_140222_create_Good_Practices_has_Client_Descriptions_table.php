<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateGoodPracticesHasClientDescriptionsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('Good_Practices_has_Client_Descriptions', function(Blueprint $table)
		{
			$table->integer('Good_Practices_ID')->index('fk_Good_Practices_has_Client_Descriptions_Good_Practices1');
			$table->integer('Client_Descriptions_ID')->index('fk_Good_Practices_has_Client_Descriptions_Client_Descriptions1');
			$table->primary(['Good_Practices_ID','Client_Descriptions_ID']);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('Good_Practices_has_Client_Descriptions');
	}

}
