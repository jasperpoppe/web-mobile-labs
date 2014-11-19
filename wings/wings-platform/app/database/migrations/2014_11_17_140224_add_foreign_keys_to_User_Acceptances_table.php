<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToUserAcceptancesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('User_Acceptances', function(Blueprint $table)
		{
			$table->foreign('Users_ID', 'fk_User_Acceptances_Users1')->references('ID')->on('users')->onUpdate('NO ACTION')->onDelete('NO ACTION');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('User_Acceptances', function(Blueprint $table)
		{
			$table->dropForeign('Users_ID');
		});
	}

}
