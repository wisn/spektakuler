<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAsramaSrTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('asrama_sr', function (Blueprint $table) {
            $table->integer('id_sr', true, true)
                ->unsigned();
            $table->integer('nim')
                ->nullable(false);
            $table->string('username', 16)
                ->nullable(false);
            $table->string('password')
                ->nullable(false);
            $table->integer('id_gedung')
                ->nullable(false)
                ->default(0);
            $table->timestamps();

            $table->unique(['nim']);
        });

        Schema::table('asrama_sr', function (Blueprint $table) {
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
        Schema::dropIfExists('asrama_sr');
    }
}
