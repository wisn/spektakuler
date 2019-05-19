<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAsramaMahasiswaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('asrama_mahasiswa', function (Blueprint $table) {
            $table->integer('id', true, true)
                ->unsigned();
            $table->integer('nim')
                ->nullable(false);
            $table->string('username', 16)
                ->nullable(false);
            $table->string('password')
                ->nullable(false);
            $table->timestamps();

            $table->unique(['username']);
        });

        Schema::table('asrama_mahasiswa', function (Blueprint $table) {
            $table->foreign('nim')
                ->references('nim')
                ->on('sm_mahasiswa');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('asrama_mahasiswa');
    }
}
