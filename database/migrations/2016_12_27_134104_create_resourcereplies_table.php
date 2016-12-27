<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateResourcerepliesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
   public function up()
    {
        Schema::create('resourcereplies', function(Blueprint $table)
        {
            $table->integer('id', true);
            $table->string('content', 500);
            $table->timestamps();
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
        Schema::drop('resourcereplies');
    }
}
