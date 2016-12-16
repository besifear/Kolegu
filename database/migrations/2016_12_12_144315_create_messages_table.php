<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMessagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('messages', function(Blueprint $table)
        {
            $table->integer('id', true);
            $table->string('subject',100);
            $table->string('content', 500);
            $table->timestamps();
            $table->integer('sender_id');
            $table->integer('reciever_id');

            $table->foreign('sender_id')->references('id')->on('users');
            $table->foreign('reciever_id')->references('id')->on('users');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('messages');
    }
}
