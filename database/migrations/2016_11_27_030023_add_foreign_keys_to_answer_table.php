<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToAnswerTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('answer', function(Blueprint $table)
		{
			$table->foreign('QuestionID', 'fk_Answer_QuestionID')->references('QuestionID')->on('question')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('Username', 'fk_Answer_Username')->references('Username')->on('user')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('answer', function(Blueprint $table)
		{
			$table->dropForeign('fk_Answer_QuestionID');
			$table->dropForeign('fk_Answer_Username');
		});
	}

}
