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
            $table->string('nama_gedung', 2)
                ->nullable(false);
            $table->integer('kapasitas')
                ->nullable(false)
                ->unsigned();
            $table->integer('tersisa')
                ->nullable(false)
                ->default(0)
                ->unsigned();
            $table->timestamps();

            $table->index(['no_kamar']);
        });

        Schema::table('asrama_kamar', function (Blueprint $table) {
            $table->foreign('nama_gedung')
                ->references('nama')
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
