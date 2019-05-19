<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHrCutiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hr_cuti', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('jeniscuti',20);
            $table->dateTime('rentangtanggal');
            $table->string('status',20);
            $table->string('keterangan',100);
            $table->string('nip', 8);
            $table->string('id_fakultas', 4);
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
        Schema::dropIfExists('hr_cuti');
    }
}
