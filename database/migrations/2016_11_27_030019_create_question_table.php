<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateQuestionTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('question', function(Blueprint $table)
		{
			$table->integer('QuestionID', true);
			$table->string('Title', 50);
			$table->string('Content', 500);
			$table->string('CategoryName', 50)->index('fk_Question_CategoryName');
			$table->string('Username', 50)->index('fk_Question_Username');
			$table->timestamps();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('question');
	}

}
