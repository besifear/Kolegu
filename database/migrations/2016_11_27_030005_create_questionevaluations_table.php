<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateQuestionevaluationsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('questionevaluations', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->string('vote', 3);
			$table->integer('question_id');
			$table->integer('user_id');
			$table->unique(['question_id','user_id'], 'question_id_user_id');

			$table->foreign('question_id')->references('id')->on('questions');
        	$table->foreign('user_id')->references('id')->on('users');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('questionevaluations');
	}

}
