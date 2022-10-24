<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('patients', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('age');
            $table->string('sex');
            $table->string('address');
            $table->string('mobile');
            $table->string('blood_group');
            $table->string('weight');
            $table->string('maritial_status');
            $table->string('ocupation');
            $table->string('religion');
            $table->string('temprature');
            $table->string('blood_pressure');
            $table->string('pulse');
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
        Schema::dropIfExists('patients');
    }
};
