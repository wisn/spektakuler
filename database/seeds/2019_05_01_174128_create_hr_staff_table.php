<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHrStaffTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hr_staff', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nip_staff',8)->unique();
            $table->String('jenis_staff',20);
            $table->string('nama', 50);
            $table->string('alamat', 100);
            $table->string('ttl', 100);
            $table->integer('nohp');
            $table->integer('gaji');
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
        Schema::dropIfExists('hr_staff');
    }
}
