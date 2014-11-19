<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToEventsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('Events', function(Blueprint $table)
		{
			$table->foreign('Event_Types_ID', 'fk_Events_Event_Types1')->references('ID')->on('Event_Types')->onUpdate('NO ACTION')->onDelete('NO ACTION');
			$table->foreign('Countries_ID', 'fk_Events_Countries1')->references('ID')->on('Countries')->onUpdate('NO ACTION')->onDelete('NO ACTION');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('Events', function(Blueprint $table)
		{
			$table->dropForeign('Event_Types_ID');
			$table->dropForeign('Countries_ID');
		});
	}

}
