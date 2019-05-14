<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAsramaGedungTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('asrama_gedung', function (Blueprint $table) {
            $table->integer('id_gedung', true, true)
                ->unsigned();
            $table->string('nama', 2)
                ->nullable(false);
            $table->set('kategori', ['putra', 'putri'])
                ->nullable(false)
                ->default('putra');
            $table->integer('kapasitas')
                ->nullable(false);
            $table->integer('tersisa')
                ->nullable(false);
            $table->string('lokasi')
                ->nullable(true);
            $table->timestamps();

            $table->index(['nama']);
            $table->unique(['nama']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('asrama_gedung');
    }
}
