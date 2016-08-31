<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAnswersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('answers', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('question_num');
            $table->integer('quiz_id')->unsigned();
            $table->integer('question_id')->unsigned();
            $table->string('text');
            $table->boolean('correct');
            $table->timestamps();
            $table->index('question_num');
            $table->index('quiz_id');
            $table->index('correct');
            $table->index(['question_num', 'quiz_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('answers');
    }
}
