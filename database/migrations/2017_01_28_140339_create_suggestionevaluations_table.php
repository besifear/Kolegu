<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSuggestionevaluationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('suggestionevaluations', function(Blueprint $table)
        {
            $table->integer('id', true);
            $table->string('vote',3);
            $table->integer('suggestion_id');
            $table->integer('user_id');

            $table->foreign('suggestion_id')->references('id')->on('suggestions');
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
        Schema::drop('suggestionevaluations');
    }
}
