<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddForeignKeysToAnswerevaluations extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('answerevaluations', function(Blueprint $table)
        {
            $table->foreign('answer_id', 'fk_answerevaluations_answers_id')->references('id')->on('answers');
            $table->foreign('user_id', 'fk_answerevaluations_users_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('answerevaluations', function(Blueprint $table)
        {
            $table->dropForeign('fk_answerevaluations_answers_id');
            $table->dropForeign('fk_answerevaluations_users_id');
        });
    }
}
