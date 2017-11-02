<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddParentIdToCategories extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('categories', function(Blueprint $table){
            $table->integer('parent_id')->unsigned()->nullable();
            $table->foreign('parent_id', 'fk_categories_parent_id')->references('id')->on('categories');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('categories', function(Blueprint $table){
            $table->dropForeign('fk_categories_parent_id');
            $table->dropColumn('parent_id');
        });
 
    }
}
