<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateGoodPracticesHasRecognitionSupportersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('Good_Practices_has_Recognition_Supporters', function(Blueprint $table)
		{
			$table->integer('Good_Practices_ID')->index('fk_Good_Practices_has_Recognition_Supporters_Good_Practices1');
			$table->integer('Recognition_Supporters_ID')->index('fk_Good_Practices_has_Recognition_Supporters_Recognition_Supp1');
			$table->primary(['Good_Practices_ID','Recognition_Supporters_ID']);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('Good_Practices_has_Recognition_Supporters');
	}

}
