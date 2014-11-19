<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSpeakersHasEventsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('Speakers_has_Events', function(Blueprint $table)
		{
			$table->integer('Speakers_ID')->index('fk_Speakers_has_Events_Speakers1');
			$table->integer('Events_ID')->index('fk_Speakers_has_Events_Events1');
			$table->primary(['Speakers_ID','Events_ID']);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('Speakers_has_Events');
	}

}
