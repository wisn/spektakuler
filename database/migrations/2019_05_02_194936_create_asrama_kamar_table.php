<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAsramaKamarTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('asrama_kamar', function (Blueprint $table) {
            $table->integer('id_kamar', true, true)
                ->unsigned();
            $table->integer('no_kamar')
                ->nullable(false);
            $table->integer('id_gedung')
                ->nullable(false)
                ->unsigned();
            $table->set('kategori', ['sr', 'mahasiswa'])
                ->nullable(false);
            $table->integer('kapasitas')
                ->nullable(false)
                ->unsigned();
            $table->integer('tersisa')
                ->nullable(false)
                ->unsigned();
            $table->timestamps();

            $table->index(['no_kamar']);
        });

        Schema::table('asrama_kamar', function (Blueprint $table) {
            $table->foreign('id_gedung')
                ->references('id_gedung')
                ->on('asrama_gedung');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('asrama_kamar');
    }
}
