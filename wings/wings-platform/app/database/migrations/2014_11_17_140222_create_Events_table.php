<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateEventsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('Events', function(Blueprint $table)
		{
			$table->integer('ID', true);
			$table->string('Title', 100);
			$table->date('Date');
			$table->string('Address', 200)->nullable();
			$table->string('Picture', 100)->nullable();
			$table->text('Summary');
			$table->string('URL', 200)->nullable();
			$table->text('Description');
			$table->integer('Event_Types_ID')->index('fk_Events_Event_Types1');
			$table->integer('Countries_ID')->index('fk_Events_Countries1');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('Events');
	}

}
