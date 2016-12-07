<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSelectedcategoryTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('selectedcategory', function(Blueprint $table)
		{
			$table->integer('SelectedCategoryID', true);
			$table->string('CategoryName', 50)->index('fk_SelectedCategory_CategoryName');
			$table->string('Username', 50)->index('fk_SelectedCategory_Username');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('selectedcategory');
	}

}
