<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToPartnerContactsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('Partner_Contacts', function(Blueprint $table)
		{
			$table->foreign('Partners_ID', 'fk_Partner_Contacts_Partners1')->references('ID')->on('Partners')->onUpdate('NO ACTION')->onDelete('NO ACTION');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('Partner_Contacts', function(Blueprint $table)
		{
			$table->dropForeign('Partners_ID');
		});
	}

}
