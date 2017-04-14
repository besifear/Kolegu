<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddForeignKeysToResourceevaluations extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::table('resourceevaluations', function(Blueprint $table)
        {
            $table->foreign('resource_id', 'fk_resourceevaluations_resources_id')->references('id')->on('resources');
            $table->foreign('user_id', 'fk_resourceevaluations_users_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('resourceevaluations', function(Blueprint $table)
        {
            $table->dropForeign('fk_resourceevaluations_resources_id');
            $table->dropForeign('fk_resourceevaluations_users_id');
        });
    }
}
