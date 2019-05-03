<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePpmPapersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ppm_papers', function (Blueprint $table) {
            $table->increments('id_paper');
            $table->string('title');
            $table->date('date');
            $table->bigInteger('fund');
            $table->string('file_path')->nullable();
            $table->set('status', ['pending', 'verified', 'approved', 'for-revision', 'revised']);
            $table->integer('id_event');
            $table->string('nip_dosen');
            $table->integer('id_staff')->nullable();
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
        Schema::dropIfExists('ppm_papers');
    }
}
