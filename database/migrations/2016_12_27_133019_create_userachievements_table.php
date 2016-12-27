<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserachievementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
     public function up()
    {
        Schema::create('userachievements', function(Blueprint $table)
        {
            $table->integer('id', true);

            
            $table->integer('achievement_id');
            $table->integer('user_id');

            $table->foreign('achievement_id')->references('id')->on('achievements');
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
        Schema::drop('userachievements');
    }
}
