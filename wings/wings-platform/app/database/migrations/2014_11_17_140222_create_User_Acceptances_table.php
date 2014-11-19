<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateUserAcceptancesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('User_Acceptances', function(Blueprint $table)
		{
			$table->integer('ID', true);
			$table->integer('Users_ID')->index('fk_User_Acceptances_Users1');
			$table->string('Token', 200);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('User_Acceptances');
	}

}
