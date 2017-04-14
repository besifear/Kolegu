<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToSelectedcategoriesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('selectedcategories', function(Blueprint $table)
		{
			$table->foreign('category_id', 'fk_selectedcategory_category_id')->references('id')->on('categories');
			$table->foreign('user_id', 'fk_selectedcategory_user_id')->references('id')->on('users');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('selectedcategories', function(Blueprint $table)
		{
			$table->dropForeign('fk_selectedcategory_category_id');
			$table->dropForeign('fk_selectedcategory_user_id');
		});
	}

}
