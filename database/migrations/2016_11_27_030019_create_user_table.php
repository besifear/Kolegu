<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateUserTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('user', function(Blueprint $table)
		{
			$table->string('Username', 50)->primary();
			$table->binary('Password', 128);
			$table->rememberToken();
			$table->string('Description', 1000)->nullable();
			$table->string('Avatar', 100)->nullable();
			$table->string('Rank', 50)->nullable();
			$table->string('Role', 50)->nullable();
			$table->integer('Reputation')->nullable();
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
		Schema::drop('user');
	}

}
