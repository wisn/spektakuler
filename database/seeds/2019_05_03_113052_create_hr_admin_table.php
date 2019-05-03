<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHrAdminTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hr_admin', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nip_admin',8)->unique();
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
        Schema::dropIfExists('hr_admin');
    }
}
