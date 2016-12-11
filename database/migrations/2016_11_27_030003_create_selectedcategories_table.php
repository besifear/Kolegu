<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSelectedcategoriesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('selectedcategories', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('category_id');
			$table->integer('user_id');

			$table->foreign('category_id')->references('id')->on('categories');
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
		Schema::drop('selectedcategories');
	}

}
