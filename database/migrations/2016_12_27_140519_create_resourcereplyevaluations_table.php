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
            $table->increments('id', true);
            $table->string('vote',3);
            $table->integer('resourcereply_id')->unsigned();
            $table->integer('user_id')->unsigned();
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
