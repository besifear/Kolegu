<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToQuestionTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('question', function(Blueprint $table)
		{
			$table->foreign('CategoryName', 'fk_Question_CategoryName')->references('Name')->on('category')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('Username', 'fk_Question_Username')->references('Username')->on('user')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('question', function(Blueprint $table)
		{
			$table->dropForeign('fk_Question_CategoryName');
			$table->dropForeign('fk_Question_Username');
		});
	}

}
