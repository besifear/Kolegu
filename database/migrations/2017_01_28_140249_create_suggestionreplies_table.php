<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSuggestionrepliesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
   public function up()
    {
        Schema::create('suggestionreplies', function(Blueprint $table)
        {
            $table->integer('id', true);
            $table->string('content', 500);
            $table->timestamps();
            $table->integer('suggestion_id');
            $table->integer('user_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('suggestion_id')->references('id')->on('suggestions');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
   public function down()
    {
        Schema::drop('suggestionreplies');
    }
}
