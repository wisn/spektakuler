<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Peminjaman extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('logistik_peminjaman', function(Blueprint $table) {
           $table->bigIncrements('noPeminjaman');
           $table->string('nim', 10)->unique();
           $table->string('kode_logistik', 10)->unique();
           $table->string('tgl_transaksi', 30);
           $table->string('status', 20);
           $table->string('kegiatan', 20);
           $table->string('tgl_pinjam', 15);
           $table->string('tgl_pengambilan', 15);
           
           
           $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('logistik_peminjaman');
    }
}