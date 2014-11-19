<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToAnswersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('Answers', function(Blueprint $table)
		{
			$table->foreign('Questions_ID', 'fk_Answers_Questions1')->references('ID')->on('Questions')->onUpdate('NO ACTION')->onDelete('NO ACTION');
			$table->foreign('Users_ID', 'fk_Answers_Users1')->references('ID')->on('users')->onUpdate('NO ACTION')->onDelete('NO ACTION');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('Answers', function(Blueprint $table)
		{
			$table->dropForeign('Questions_ID');
			$table->dropForeign('Users_ID');
		});
	}

}
