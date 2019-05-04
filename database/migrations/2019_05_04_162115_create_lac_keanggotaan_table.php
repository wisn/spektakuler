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
            $table->bigIncrements('id');
            $table->string('NIM', 10);
            $table->string('status_keanggotaan');
            $table->date('expire_keanggotaan');
            $table->string('pembayaran_keanggotaan');
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
