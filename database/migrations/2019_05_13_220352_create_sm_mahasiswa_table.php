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
            $table->integer('id_mahasiswa', true, true)
                ->unsigned();
            $table->string('nim', 10)
                ->nullable(false);
            $table->string('username', 16)
                ->nullable(false);
            $table->string('password')
                ->nullable(false);
            $table->string('nama')
                ->nullable(false);
            $table->string('fakultas', 3)
                ->nullable(false);
            $table->string('prodi')
                ->nullable(false);
            $table->integer('angkatan')
                ->nullable(false)
                ->unsigned();
            $table->timestamps();

            $table->index(['nim']);
            $table->unique(['username']);
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
