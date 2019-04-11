<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQuestionCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('question_comments', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('text');
            $table->enum('state', ['draft', 'active'])->default('draft');
            $table->unsignedBigInteger('users_question_id');
            $table->unsignedBigInteger('comment_id');
            $table->timestamps();

            $table->foreign('comment_id')->references('id')->on('question_comments');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('question_comments');
    }
}
