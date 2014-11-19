<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePartnersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('Partners', function(Blueprint $table)
		{
			$table->integer('ID', true);
			$table->string('Name', 100);
			$table->boolean('Consortium');
			$table->string('Picture', 100);
			$table->string('URL', 200)->nullable();
			$table->text('Description')->nullable();
			$table->string('Address', 100)->nullable();
			$table->integer('Countries_ID')->index('fk_Partners_Countries1');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('Partners');
	}

}
