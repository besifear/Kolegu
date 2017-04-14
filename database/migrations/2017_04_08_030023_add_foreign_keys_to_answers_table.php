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
		Schema::table('answers', function(Blueprint $table)
		{
			$table->foreign('question_id', 'fk_answer_question_id')->references('id')->on('questions')
                ->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('user_id', 'fk_answer_user_id')->references('id')->on('users')
                ->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('answers', function(Blueprint $table)
		{
			$table->dropForeign('fk_answer_question_id');
			$table->dropForeign('fk_answer_user_id');
		});
	}

}
