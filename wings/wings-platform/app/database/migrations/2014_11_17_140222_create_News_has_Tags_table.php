<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateNewsHasTagsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('News_has_Tags', function(Blueprint $table)
		{
			$table->integer('News_ID')->index('fk_News_has_Tags_News1');
			$table->integer('Tags_ID')->index('fk_News_has_Tags_Tags1');
			$table->primary(['News_ID','Tags_ID']);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('News_has_Tags');
	}

}
