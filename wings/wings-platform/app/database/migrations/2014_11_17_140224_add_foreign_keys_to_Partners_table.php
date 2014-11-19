<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToPartnersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('Partners', function(Blueprint $table)
		{
			$table->foreign('Countries_ID', 'fk_Partners_Countries1')->references('ID')->on('Countries')->onUpdate('NO ACTION')->onDelete('NO ACTION');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('Partners', function(Blueprint $table)
		{
			$table->dropForeign('Countries_ID');
		});
	}

}
