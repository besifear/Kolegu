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
			$table->integer('user_id')->unsigned();
		    $table->softDeletes();
            $table->timestamps();

//			$table->foreign('category_id')->references('id')->on('categories');
//        	$table->foreign('user_id')->references('id')->on('users');
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
