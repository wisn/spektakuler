<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePpmEvaluatorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ppm_evaluators', function (Blueprint $table) {
            $table->increments('id_evaluator');
            $table->string('username', 50)->unique();
            $table->string('email', 50)->unique();
            $table->string('password');
            $table->string('name');
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
        Schema::dropIfExists('ppm_evaluators');
    }
}
