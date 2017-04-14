<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddForeignKeysToMessagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('messages', function(Blueprint $table){
            $table->foreign('sender_id', 'fk_message_user_sender_id')->references('id')->on('users')
                ->onUpdate('RESTRICT')->onDelete('RESTRICT');
            $table->foreign('reciever_id', 'fk_message_user_reciever_id')->references('id')->on('users')
                ->onUpdate('RESTRICT')->onDelete('RESTRICT');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('messages', function(Blueprint $table){
            $table->dropForeign('fk_message_user_sender_id');
            $table->dropForeign('fk_message_user_reciever_id');
        });
    }
}
