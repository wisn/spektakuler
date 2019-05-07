<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLacListUjianTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lac_list_ujian', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nama_ujian');
            $table->string('Tipe_Ujian');
            $table->integer('Biaya_Ujian');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('lac_list_ujian');
    }
}
