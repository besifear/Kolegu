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
			$table->increments('id', true);
			$table->string('vote', 3);
			$table->integer('question_id')->unsigned();
			$table->integer('user_id')->unsigned();
			$table->unique(['question_id','user_id'], 'question_id_user_id');

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
