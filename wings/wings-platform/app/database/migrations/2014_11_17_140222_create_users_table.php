<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateUsersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('users', function(Blueprint $table)
		{
			$table->integer('ID', true);
			$table->string('First_name', 50);
			$table->string('Last_name', 60);
			$table->string('Email', 100);
			$table->string('Password', 100);
			$table->text('Biography')->nullable();
			$table->string('Profession', 100)->nullable();
			$table->string('Picture', 100)->nullable();
			$table->string('LinkedIn', 200)->nullable();
			$table->string('Website', 200)->nullable();
			$table->boolean('Mentor');
			$table->integer('Countries_ID')->index('fk_Users_Countries');
			$table->integer('User_Roles_ID')->index('fk_Users_User_Roles1');
			$table->timestamps();
			$table->dateTime('Accept_date')->nullable();
			$table->string('remember_token', 100)->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('users');
	}

}
