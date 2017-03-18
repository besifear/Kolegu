<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateAnswersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('answers', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->string('content', 500);
			$table->timestamps();
			$table->integer('question_id');
			$table->integer('user_id');
            $table->integer('totalVotes')->default(0);
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
		Schema::drop('answers');
	}

}
