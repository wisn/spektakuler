<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQuestionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('question', function (Blueprint $table) {
            $table->bigIncrements('id_question');
            $table->integer('tahun_kelulusan');
            $table->string('pertanyaan',300);
            $table->string('jawabanA',300);
            $table->string('jawabanB',300);
            $table->string('jawabanC',300);
            $table->string('jawabanD',300);
            $table->string('jawabanE',300);
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
        Schema::dropIfExists('question');
    }
}
