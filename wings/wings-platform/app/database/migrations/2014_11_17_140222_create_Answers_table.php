<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateAnswersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('Answers', function(Blueprint $table)
		{
			$table->integer('ID', true);
			$table->text('Answer');
			$table->boolean('Correct');
			$table->integer('Questions_ID')->index('fk_Answers_Questions1');
			$table->integer('Users_ID')->index('fk_Answers_Users1');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('Answers');
	}

}
