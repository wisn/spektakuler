<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSmMahasiswaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sm_mahasiswa', function (Blueprint $table) {
            $table->integer('id_mahasiswa', true, true);
            $table->integer('nim')
                ->nullable(false);
            $table->string('nama', 255)
                ->nullable(false);
            $table->set('gender', ['L', 'P'])
                ->nullable(false);
            $table->integer('angkatan')
                ->nullable(false);
            $table->set('fakultas', ['FIF', 'FTE'])
                ->nullable(false);
            $table->string('program_studi', 50)
                ->nullable(false);
            $table->text('alamat')
                ->nullable(false);
            $table->timestamps();

            $table->unique('nim');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sm_mahasiswa');
    }
}
