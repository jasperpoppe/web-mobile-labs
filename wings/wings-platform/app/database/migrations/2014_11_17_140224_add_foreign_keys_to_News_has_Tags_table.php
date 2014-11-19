<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToNewsHasTagsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('News_has_Tags', function(Blueprint $table)
		{
			$table->foreign('News_ID', 'fk_News_has_Tags_News1')->references('ID')->on('News')->onUpdate('NO ACTION')->onDelete('NO ACTION');
			$table->foreign('Tags_ID', 'fk_News_has_Tags_Tags1')->references('ID')->on('Tags')->onUpdate('NO ACTION')->onDelete('NO ACTION');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('News_has_Tags', function(Blueprint $table)
		{
			$table->dropForeign('News_ID');
			$table->dropForeign('Tags_ID');
		});
	}

}
