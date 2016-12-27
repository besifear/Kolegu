<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateResourceevaluationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('resourceevaluations', function(Blueprint $table)
        {
            $table->integer('id', true);
            $table->string('vote',3);
            $table->integer('resource_id');

            $table->foreign('resource_id')->references('id')->on('resources');

        });
    }
    /**
     * Reverse the migrations.
     *
     * @return void
     */
   public function down()
    {
        Schema::drop('resourceevaluations');
    }
}
