<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateLearningMaterialsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('Learning_Materials', function(Blueprint $table)
		{
			$table->integer('ID', true);
			$table->string('Title', 100);
			$table->text('Summary');
			$table->text('Full_Text');
			$table->time('Time')->nullable();
			$table->string('Provider', 60)->nullable();
			$table->string('URL_to_provider', 200)->nullable();
			$table->string('URL_to_learning_resource', 200)->nullable();
			$table->string('Author_linkedin', 200)->nullable();
			$table->string('Picture', 100)->nullable();
			$table->boolean('Public');
			$table->integer('Media_Types_ID')->index('fk_Learning_Materials_Media_Types1');
			$table->integer('Categories_ID')->index('fk_Learning_Materials_Categories1');
			$table->integer('Countries_ID')->index('fk_Learning_Materials_Countries1');
			$table->integer('Languages_ID')->index('fk_Learning_Materials_Languages1');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('Learning_Materials');
	}

}
