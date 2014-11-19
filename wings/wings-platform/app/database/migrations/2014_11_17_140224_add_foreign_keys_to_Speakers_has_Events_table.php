<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToSpeakersHasEventsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('Speakers_has_Events', function(Blueprint $table)
		{
			$table->foreign('Speakers_ID', 'fk_Speakers_has_Events_Speakers1')->references('ID')->on('Speakers')->onUpdate('NO ACTION')->onDelete('NO ACTION');
			$table->foreign('Events_ID', 'fk_Speakers_has_Events_Events1')->references('ID')->on('Events')->onUpdate('NO ACTION')->onDelete('NO ACTION');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('Speakers_has_Events', function(Blueprint $table)
		{
			$table->dropForeign('Speakers_ID');
			$table->dropForeign('Events_ID');
		});
	}

}
