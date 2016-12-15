<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateAnswerevaluationsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('answerevaluations', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->string('vote', 3);
			$table->integer('answer_id');
			$table->integer('user_id');
			$table->unique(['answer_id','user_id'], 'AnswerIDUsername');

			$table->foreign('answer_id')->references('id')->on('answers');
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
		Schema::drop('answerevaluation');
	}

}
