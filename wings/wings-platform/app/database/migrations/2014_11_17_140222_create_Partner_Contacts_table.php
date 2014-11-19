<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePartnerContactsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('Partner_Contacts', function(Blueprint $table)
		{
			$table->integer('ID', true);
			$table->string('Name', 60);
			$table->string('Email', 50);
			$table->string('Linkedin', 200)->nullable();
			$table->integer('Partners_ID')->index('fk_Partner_Contacts_Partners1');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('Partner_Contacts');
	}

}
