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
			$table->increments('id', true);
			$table->string('vote', 3);
			$table->integer('answer_id')->unsigned();
			$table->integer('user_id')->unsigned();
			$table->unique(['answer_id','user_id'], 'AnswerIDUsername');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('answerevaluations');
	}

}
