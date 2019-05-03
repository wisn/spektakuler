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
        $table->integer('id_nilai', true, true)
              ->unsigned();
          $table->integer('nim')
              ->nullable(false);
          $table->string('nama')
              ->nullable(false);
          $table->set('tipe_tes', ['EPrT', 'ECCT'])
              ->nullable(false)
              ->default('EPrT');
          $table->string('tipe_peserta')
              ->nullable(false);
          $table->string('ruangan')
              ->nullable(false);
          $table->integer('nilai')
              ->unsigned();
          $table->timestamps();
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