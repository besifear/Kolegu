<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToQuestionevaluationTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('questionevaluation', function(Blueprint $table)
		{
			$table->foreign('QuestionID', 'fk_QuestionEvaluation_QuestionID')->references('QuestionID')->on('question')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('Username', 'fk_QuestionEvaluation_Username')->references('Username')->on('user')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('questionevaluation', function(Blueprint $table)
		{
			$table->dropForeign('fk_QuestionEvaluation_QuestionID');
			$table->dropForeign('fk_QuestionEvaluation_Username');
		});
	}

}
