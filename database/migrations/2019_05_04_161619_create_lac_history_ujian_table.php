<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLacHistoryUjianTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lac_history_ujian', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('NIM', 10);
            $table->string('Nama');
            $table->date('Tgl_Test');
            $table->date('Tgl_Daftar');
            $table->string('Tipe_Test');
            $table->string('Tipe_Peserta');
            $table->string('Ruangan');
            $table->boolean('Status_Pembayaran');
            $table->boolean('Status_Persetujuan');
            $table->string('Jenis_History');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('lac_history_ujian');
    }
}
