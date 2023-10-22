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
        Schema::create('quesion_answered', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_quiz_id');
            $table->foreign('user_quiz_id')->references('id')->on('user_quiz');
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
        Schema::dropIfExists('quesion_answered');
    }
};
