<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAsramaPendampingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('asrama_pendamping', function (Blueprint $table) {
            $table->integer('id_pendamping', true, true)
                ->unsigned();
            $table->integer('id_sr')
                ->nullable(false)
                ->unsigned();
            $table->integer('id_kamar')
                ->nullable(false)
                ->unsigned();
            $table->timestamps();
        });

        Schema::table('asrama_pendamping', function (Blueprint $table) {
            $table->foreign('id_sr')
                ->references('id_sr')
                ->on('asrama_sr');

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
        Schema::dropIfExists('asrama_pendamping');
    }
}
