<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToQuestionevaluationsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('questionevaluations', function(Blueprint $table)
		{
			$table->foreign('question_id', 'fk_questionEvaluation_question_id')->references('id')->on('questions');
			$table->foreign('user_id', 'fk_questionEvaluation_user_id')->references('id')->on('users');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('questionevaluations', function(Blueprint $table)
		{
			$table->dropForeign('fk_questionEvaluation_question_id');
			$table->dropForeign('fk_questionEvaluation_user_id');
		});
	}

}
