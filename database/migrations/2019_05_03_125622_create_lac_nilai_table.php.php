<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLacNilaiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('lac_nilai', function (Blueprint $table) {
        $table->bigIncrements('Id');
        $table->date('Tgl_Test');
        $table->string('Tipe_Test');
        $table->string('NIM', 10);
        $table->string('Nama');
        $table->string('Tipe_Peserta');
        $table->string('Ruangan');
        $table->integer('Nilai_Total');
        $table->string('Jenis_Nilai');
      });

      // Cannot foreign table with table 'akun' because table 'akun' hasn't created yet

      // Schema::table('lac_nilai', function (Blueprint $table) {
      //     $table->foreign('nim')
      //         ->references('nim')
      //         ->on('akun');
      // });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
      Schema::dropIfExists('lac_nilai');
    }
}