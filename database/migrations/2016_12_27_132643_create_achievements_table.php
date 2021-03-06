<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAchievementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
     public function up()
    {
        Schema::create('achievements', function(Blueprint $table)
        {
            $table->increments('id', true);
            $table->string('identifier', 50)->unique(); 
            $table->string('name',50)->unique();
            $table->string('description',300);
            $table->string('icon', 100);
            $table->integer('reputationaward')->unsigned();
            $table->string('difficulty',20);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('achievements');
    }
}
