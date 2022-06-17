<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKarbonDioksidas extends Migration
{
    /**W
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('karbon_dioksidas', function (Blueprint $table) {
            $table->id();
            $table->string('CO2');
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
        Schema::dropIfExists('karbon_dioksidas');
    }
}
