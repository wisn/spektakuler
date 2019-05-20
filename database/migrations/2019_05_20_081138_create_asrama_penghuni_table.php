<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAsramaPenghuniTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('asrama_penghuni', function (Blueprint $table) {
            $table->integer('id_penghuni', true, true)
                ->unsigned();
            $table->integer('id_mahasiswa')
                ->nullable(false)
                ->unsigned();
            $table->integer('id_kamar')
                ->nullable(false)
                ->unsigned();
            $table->timestamps();
        });

        Schema::table('asrama_penghuni', function (Blueprint $table) {
            $table->foreign('id_mahasiswa')
                ->references('id_mahasiswa')
                ->on('sm_mahasiswa');

            $table->foreign('id_kamar')
                ->references('id_kamar')
                ->on('asrama_kamar');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('asrama_penghuni');
    }
}
