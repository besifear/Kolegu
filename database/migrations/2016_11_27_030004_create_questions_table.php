<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateQuestionsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('questions', function(Blueprint $table)
		{
			$table->increments('id', true);
			$table->string('title', 50);
			$table->string('content', 500);
            $table->integer('votes');
			$table->integer('category_id')->unsigned();
			$table->integer('answer_id')->unsigned()->nullable();
			$table->integer('user_id')->unsigned();
		    $table->softDeletes();
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
		Schema::drop('questions');
	}

}
