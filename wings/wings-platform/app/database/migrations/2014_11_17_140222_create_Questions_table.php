<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateQuestionsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('Questions', function(Blueprint $table)
		{
			$table->integer('ID', true);
			$table->string('Subject', 100);
			$table->text('Question');
			$table->integer('Users_ID')->index('fk_Questions_Users1');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('Questions');
	}

}
