<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateQuestionevaluationTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('questionevaluation', function(Blueprint $table)
		{
			$table->integer('QuestionEvaluationID', true);
			$table->string('Vote', 3);
			$table->integer('QuestionID')->index('fk_QuestionEvaluation_QuestionID');;
			$table->string('Username', 50)->index('fk_QuestionEvaluation_Username');
			$table->unique(['QuestionID','Username'], 'QuestionIDUsername');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('questionevaluation');
	}

}
