<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSuggestionreplyevaluationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('suggestionreplyevaluations', function(Blueprint $table)
        {
            $table->integer('id', true);
            $table->string('vote',3);
            $table->integer('suggestionreply_id');
            $table->integer('user_id');

            $table->foreign('suggestionreply_id')->references('id')->on('suggestionreplies');
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
        Schema::drop('suggestionreplyevaluations');
    }
}
