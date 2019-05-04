<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLacKeanggotaanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lac_keanggotaan', function (Blueprint $table) {
            $table->string('NIM', 10)->unique();
            $table->string('Nama');
            $table->string('status');
            $table->date('expire');
            $table->string('pembayaran');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('lac_keanggotaan');
    }
}
