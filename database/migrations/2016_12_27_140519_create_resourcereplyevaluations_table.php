<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateResourcereplyevaluationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('resourcereplyevaluations', function(Blueprint $table)
        {
            $table->integer('id', true);
            $table->string('vote',3);
            $table->integer('resourcereply_id');
            $table->integer('user_id');

            $table->foreign('resourcereply_id')->references('id')->on('resourcereplies');
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
        Schema::drop('resourcereplyevaluations');
    }
}
