<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToSelectedcategoryTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('selectedcategory', function(Blueprint $table)
		{
			$table->foreign('CategoryName', 'fk_SelectedCategory_CategoryName')->references('Name')->on('category')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('Username', 'fk_SelectedCategory_Username')->references('Username')->on('user')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('selectedcategory', function(Blueprint $table)
		{
			$table->dropForeign('fk_SelectedCategory_CategoryName');
			$table->dropForeign('fk_SelectedCategory_Username');
		});
	}

}
