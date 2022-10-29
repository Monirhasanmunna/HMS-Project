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
            $table->foreignId('doctor_id')->constrained('doctors')->onDelete('cascade');
            $table->integer('bedgroup_id');
            $table->integer('bed_id');
            $table->string('blood_group')->nullable();
            $table->string('name');
            $table->string('age');
            $table->string('sex');
            $table->string('address');
            $table->string('mobile');
            $table->string('weight')->nullable();
            $table->string('maritial_status')->nullable();
            $table->string('ocupation')->nullable();
            $table->string('religion')->nullable();
            $table->integer('paid');
            $table->integer('due')->default(0);
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
