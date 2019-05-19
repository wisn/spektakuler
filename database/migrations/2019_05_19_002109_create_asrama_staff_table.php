<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAsramaStaffTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('asrama_staff', function (Blueprint $table) {
            $table->integer('id', true, true)
                ->unsigned();
            $table->string('nip_staff', 8)
                ->nullable(false);
            $table->string('username', 16)
                ->nullable(false);
            $table->string('password')
                ->nullable(false);
            $table->timestamps();
        });

        Schema::table('asrama_staff', function (Blueprint $table) {
            $table->foreign('nip_staff')
                ->references('nip_staff')
                ->on('hr_staff');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('asrama_staff');
    }
}
