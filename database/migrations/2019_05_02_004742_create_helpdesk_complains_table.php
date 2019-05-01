<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHelpdeskComplainsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('helpdesk_complains', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('id_helpdesk_user');
            $table->string('judul_complain', 30);
            $table->date('tanggal_complain');
            $table->text('isi_complain');
            // TODO: Determine `status_complain`
            $table->set('kategori_complain', [
                'akademik',
                'non akademik',
                'fasilitas',
                'pelayanan',
                'administrasi',
            ]);
            $table->timestamps();

            $table->index(['id_helpdesk_user']);

            // TODO: Fix foreign key
            //$table->foreign('id_helpdesk_user')
            //  ->references('id')
            //  ->on('helpdesk_users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('helpdesk_complains');
    }
}
