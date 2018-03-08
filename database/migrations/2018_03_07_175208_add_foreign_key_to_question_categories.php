<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddForeignKeyToQuestionCategories extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('questioncategories', function (Blueprint $table) {
            $table->foreign('question_id', 'fk_questioncategories_questions')->references('id')->on('questions'); 
            $table->foreign('category_id', 'fk_questioncategories_categories')->references('id')->on('categories');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('questioncategories', function (Blueprint $table) {
            $table->dropForeign('fk_questioncategories_questions'); 
            $table->dropForeign('fk_questioncategories_categories'); 
        });
    }
}
