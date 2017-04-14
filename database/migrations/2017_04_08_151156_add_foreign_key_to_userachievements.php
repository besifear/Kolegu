<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddForeignKeyToUserachievements extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('userachievements',function(Blueprint $table){
            $table->foreign('achievement_id', 'fk_userachievements_achievements_id')->references('id')->on('achievements');
            $table->foreign('user_id', 'fk_userachievements_users_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('userachievements', function(Blueprint $table){
            $table->dropForeign('fk_userachievements_achievements_id');
            $table->dropForeign('fk_userachievements_users_id');
        });
    }
}
