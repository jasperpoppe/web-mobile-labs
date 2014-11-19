<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToUsersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('users', function(Blueprint $table)
		{
			$table->foreign('Countries_ID', 'fk_Users_Countries')->references('ID')->on('Countries')->onUpdate('NO ACTION')->onDelete('NO ACTION');
			$table->foreign('User_Roles_ID', 'fk_Users_User_Roles1')->references('ID')->on('User_Roles')->onUpdate('NO ACTION')->onDelete('NO ACTION');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('users', function(Blueprint $table)
		{
			$table->dropForeign('Countries_ID');
			$table->dropForeign('User_Roles_ID');
		});
	}

}
