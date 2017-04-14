<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddForeignKeysToResourcereplyevaluations extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('resourcereplyevaluations',function(Blueprint $table){
            $table->foreign('resourcereply_id','fk_resourcereplyevaluations_resourcereplies_id')->references('id')->on('resourcereplies');
            $table->foreign('user_id', 'fk_resourcereplyevaluations_users_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('resourcereplyevaluations',function(Blueprint $table){
            $table->dropForeign('fk_resourcereplyevaluations_resourcereplies_id');
            $table->dropForeign('fk_resourcereplyevaluations_users_id');
        });
    }
}
