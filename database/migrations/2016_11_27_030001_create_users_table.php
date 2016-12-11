<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateUsersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('users', function(Blueprint $table)
		{	
			$table->integer('id', true);
			$table->string('username', 50);
			 $table->string('email')->unique();
			$table->binary('password', 128);
			$table->rememberToken();
			$table->string('description', 1000)->nullable();
			$table->string('avatar', 100)->nullable();
			$table->string('rank', 50)->nullable();
			$table->string('role', 50)->nullable();
			$table->integer('reputation')->nullable();
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
		Schema::drop('users');
	}

}
