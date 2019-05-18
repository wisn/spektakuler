<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJawabanQuestionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jawabanquestion', function (Blueprint $table) {
            $table->bigIncrements('id_jawaban');
            $table->bigInteger('NIM')->unsigned();
            $table->foreign('NIM')->references('NIM')->on('alumni');
            $table->bigInteger('id_question')->unsigned();
            $table->foreign('id_question')->references('id_question')->on('question');
            $table->string('jawaban',300);
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
        Schema::dropIfExists('jawabanquestion');
    }
}
