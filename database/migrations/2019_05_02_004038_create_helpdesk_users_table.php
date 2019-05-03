<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHelpdeskUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('helpdesk_users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('id_user')
              ->nullable(false);
            $table->set('tipe', ['mahasiswa', 'dosen', 'pegawai'])
              ->default('mahasiswa');
            $table->timestamps();

            $table->index(['id_user', 'tipe']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('helpdesk_users');
    }
}
