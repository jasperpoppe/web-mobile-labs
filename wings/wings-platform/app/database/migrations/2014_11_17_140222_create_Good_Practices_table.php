<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateGoodPracticesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('Good_Practices', function(Blueprint $table)
		{
			$table->integer('ID', true);
			$table->integer('Project_Types_ID')->index('fk_Good_Practices_Project_Types1');
			$table->string('Organisation_name', 60);
			$table->string('Contact_information', 100);
			$table->string('Project_name', 200);
			$table->string('Acronym', 60)->nullable();
			$table->string('Website', 200)->nullable();
			$table->string('Contact_name', 60)->nullable();
			$table->string('Email', 100)->nullable();
			$table->integer('Countries_ID')->index('fk_Good_Practices_Countries1');
			$table->date('Project_funding_start_date')->nullable();
			$table->date('Project_funding_end_date')->nullable();
			$table->string('Status', 45)->nullable();
			$table->string('Target_group_number_reached', 20)->nullable();
			$table->integer('Number_of_languages')->nullable();
			$table->string('Level', 45)->nullable();
			$table->string('Training_format', 60)->nullable();
			$table->string('Materials_licence', 45)->nullable();
			$table->string('Materials_available', 45)->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('Good_Practices');
	}

}
