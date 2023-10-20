<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('question_answered', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_subject_id');
            $table->foreign('user_subject_id')->references('id')->on('user_subject');
            $table->unsignedBigInteger('quesion_id');
            $table->foreign('quesion_id')->references('id')->on('quesions');
            $table->unsignedBigInteger('answer_id');
            $table->foreign('answer_id')->references('id')->on('answers');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('question_answered');
    }
};
