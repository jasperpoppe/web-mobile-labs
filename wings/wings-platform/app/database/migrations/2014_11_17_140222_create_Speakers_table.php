<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSpeakersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('Speakers', function(Blueprint $table)
		{
			$table->integer('ID', true);
			$table->string('Name', 60);
			$table->text('Biography')->nullable();
			$table->string('Profession', 60);
			$table->string('Picture', 100);
			$table->string('Linkedin', 200)->nullable();
			$table->string('Website', 100)->nullable();
			$table->integer('Countries_ID')->index('fk_Speakers_Countries1');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('Speakers');
	}

}
