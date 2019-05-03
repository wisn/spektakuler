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
            $table->string('id_cuti',10)->unique();
            $table->string('jeniscuti',20);
            $table->dateTime('rentangtanggal');
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
