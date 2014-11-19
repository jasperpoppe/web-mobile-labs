<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateNewsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('News', function(Blueprint $table)
		{
			$table->integer('ID', true);
			$table->string('Title', 100);
			$table->string('Picture', 100)->nullable();
			$table->text('Summary');
			$table->text('Description')->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('News');
	}

}
