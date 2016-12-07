<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateAnswerTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('answer', function(Blueprint $table)
		{
			$table->integer('AnswerID', true);
			$table->string('Content', 500);
			$table->timestamps();
			$table->integer('QuestionID')->index('fk_Answer_QuestionID');
			$table->string('Username', 50)->nullable()->index('fk_Answer_Username');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('answer');
	}

}
