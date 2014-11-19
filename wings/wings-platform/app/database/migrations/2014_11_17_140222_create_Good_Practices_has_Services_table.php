<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateGoodPracticesHasServicesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('Good_Practices_has_Services', function(Blueprint $table)
		{
			$table->integer('Good_Practices_ID')->index('fk_Good_Practices_has_Services_Good_Practices1');
			$table->integer('Services_ID')->index('fk_Good_Practices_has_Services_Services1');
			$table->primary(['Good_Practices_ID','Services_ID']);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('Good_Practices_has_Services');
	}

}
